<?php

namespace App\Http\Middleware;

use App\Models\GptHistory;
use App\Models\UserPackage;
use Closure;
use Illuminate\Http\Request;

class UserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $authUser = auth('web')->user();
        if ($authUser->is_active == 1) {

            $authUserId = $authUser->user_type != 'main' ? $authUser->main_user_id : $authUser->id;

            $user_package = UserPackage::where('user_id',$authUserId)->latest()->first();

            if($user_package->end_date == null){
                $date = strtotime($user_package->created_at);
                $end_date = strtotime("+7 day", $date);
                $user_package->end_date = date('Y-m-d', $end_date);
                $user_package->save();
            }

            if ($user_package->monthly_packs()->count() > 0) {
                $start_date = now()->format('Y-m-d');
                $end_data = now()->addDays('30')->format('Y-m-d');

                $user_package = $user_package->monthly_packs()->where('start_date','<=',$start_date)->where('end_date','>=',$end_data)->first();
            }

            $userPackageWords = $user_package->words;
            $From = $user_package->start_date;
			$currentDate = date('Y-m-d');
			$tomorrow = date('Y-m-d', strtotime(' +1 day'));
            $diff_in_days = now()->diffInDays($user_package->end_date);
            // dd($diff_in_days);
			if($diff_in_days == 0){
				$planExp = "Your trial expires today.";
			}
			else{
				$planExp = "Your trial expires in <b style='color: #000 !important; font-size: 15px; !important'>".$diff_in_days." days</b>.";
			}
            $end_date = strtotime($user_package->end_date);
			$words = GptHistory::where([ ['user_id',$authUserId] ])->whereBetween('created_at', [$From,$tomorrow])->sum('total_words');

            // dd($words);
            //  dd($user_package->package_id);

            session()->put('gpt_words', $words);
			session()->put('UserPackages', $user_package);
			session()->put('PackageData', $user_package->package);

            session()->put('authUser',$authUser);
            session()->put('authUserId',$authUserId);

			$premium_plan = '<a href="'.route('web.pricing').'" style="text-decoration:underline; color: #ff750a !important;" class="text-success">premium plan</a>';
            if (strtotime($currentDate) <= $end_date && $words <= $userPackageWords && $user_package->package_id == 1) {
                session()->put('package-title-sidebar',__('Trial ends in '.$diff_in_days.' days'));
                session()->put('package-msg-sidebar',__('You are on a free trial of the Starter plan on monthly billing.'));
                session()->put('package-improve-template',__('Upgrade to '.$premium_plan.' to use this feature.'));
                session()->put('package-details',__($planExp . ' Upgrade to a '.$premium_plan.' now.'));
			}elseif (strtotime($currentDate) > $end_date && $words >= $userPackageWords) {
                session()->put('package-error',__('error_msg.word_limit_reached'));
            }elseif (strtotime($currentDate) > $end_date) {
                session()->put('package-error',__('error_msg.expired'));
            }elseif ($words >= $userPackageWords) {
                session()->put('package-error',__('error_msg.word_ended'));
            }else{
                session()->forget('package-error');
                session()->forget('package-details');
                session()->forget('package-title-sidebar');
                session()->forget('package-msg-sidebar');
                session()->forget('package-improve-template');

            }

            return $next($request);
        }
        auth('web')->logout();
        \Session::flush();
        return redirect(route('login'))->withErrors(['error'=> 'Your account is not active']);
    }
}
