<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\WebhookController;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionCancel;
use App\Models\GptHistory;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\GptScoreHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(Request $request)
    {

        $authUserId = session()->get('authUserId');


        if (request()->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $hisotry = new GptHistory();

            if (isset($request->daterange) && !empty($request->daterange)) {
                $daterage = explode(' - ', $request->daterange);
                $dateS = new Carbon($daterage[0]);
                $dateE = new Carbon($daterage[1]);
                $hisotry = $hisotry->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);
            }
            $hisotry = $hisotry->where('user_id' , $authUserId)->where('type','!=','editor')->orderBy('id', 'DESC')->get(['gpt_histories.*', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
            // $hisotry = $hisotry->where('user_id' == $user_id)->orderBy('id', 'DESC')->get([
            //     'gpt_histories.*',
            //     DB::raw('@rownum  := @rownum  + 1 AS rownum')
            // ]);
            return Datatables::of($hisotry)
                ->addIndexColumn()
                ->addColumn('time', function ($row) {
                    // return $row->created_at->diffForHumans();
                    return view('admin.report.action')->with(['data' => $row])->render();
                })
                ->addColumn('type', function ($row) {
                    return $row->type == 'template' ? 'Template' : 'AI Assistant';
                })
                ->addColumn('result', function ($row) {
                    $result = '';
                    if ($row->type == 'complete') {
                        // $text = $row->prompt . ' ' . $row->answer;
                        $text = $row->answer;
                        $result =  substr($text, 0, 50) . '...';
                    }
                    if ($row->type == 'template') {
                        $result =  $row->template_name ?? 'Template';
                    } else {
                        // $text = $row->prompt . ' ' . $row->answer;
                        $text = $row->answer;
                        $result =  substr($text, 0, 50) . '...';
                    }
                    return $result;
                })
                ->addColumn('words', function ($row) {
                    return $row->total_words;
                })
                ->addColumn('score', function ($row) {
                    $temp_id = $row->id;
                    return $score = GptScoreHistory::get('gpt_score_histories.*')->where('temp_id' , $temp_id)->pluck('score');
                    // $score = $get_score->score;
                    // return $score;
                })
                ->rawColumns(['time', 'result', 'words', 'type', 'score'])
                ->make(true);
        }
        $history = GptHistory::where('user_id',$authUserId);
        $user_package = session()->get('UserPackages');
		$words  = session()->get('gpt_words');

        $data = array(
            'title' => 'Dashboard',
            'total_req' => $history->count(),
            'month_req' => $history->whereMonth('created_at', Carbon::now()->month)->count(),
            'total_token' => $history->sum('total_tokens'),
            'month_words' => $history->whereMonth('created_at', Carbon::now()->month)->sum('total_words'),
            // 'total_words' => $history->whereMonth('created_at', Carbon::now()->month)->sum('total_words'),
			'user_package' => (!empty($user_package) ? $user_package : 0),
			'total_words' => (!empty($user_package) ? $user_package : 0 ),
			'words' => (!empty($words) ? $words : 0),
        );

        return view('front.dashboard')->with($data);
    }


    public function edit_profile()
    {
        $data = array(
            'title' => 'Profile',
            'edit' => auth('web')->user(),
        );

        return view('front.profile')->with($data);
    }

    public function update_profile(Request $request)
    {
        $rules = [
            'first_name' => 'string|max:50',
            'last_name' => 'string|max:50',
            'password' => 'string|min:8|max:16',
        ];

        if (isset($request->profile_image) && !empty($request->profile_image)) {
           $rules['profile_image'] = 'image|mimes:png,jpg';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if ($request->hasFile('profile_image')) {
            $profile_img = uploadSingleFile($request->file('profile_image'), 'uploads/profile_images/');
            if (is_array($profile_img)) {
                return response()->json($profile_img);
            }
            if (file_exists($user->image)) {
                @unlink($user->image);
            }
            $user->image = $profile_img;
        }

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return response()->json([
            'success' => 'Profile Updated Successfully',
            'reload' => true,
        ]);
    }


    public function subscription()
    {
        if (session()->get('authUser')->user_type != 'main') {
            abort(403,'You are not authorized to access that page');
            die();
        }

        $user_package = session()->get('UserPackages');
		$words  = session()->get('gpt_words');
        $data = array(
            'title' => 'Package Details',
            'data' => auth('web')->user(),
			'words' => (!empty($words) ? $words : 0),
			'user_package' => (!empty($user_package) ? $user_package : 0),
            'subcription' => UserPackage::where('user_id', auth('web')->user()->id)->latest()->first(),
			'total_words' => (!empty($user_package) ? $user_package : 0 ),
        );

        return view('front.subscription_details')->with($data);
    }

    public function concelSubscription($id){

        $user_package = UserPackage::with('package')->where('user_id',hashids_decode($id))->latest()->first();

        auth('web')->user()->subscription($user_package->package->title)->cancelNow();

        $user_package->subscription_id = null;
        $user_package->save();

        $detail = [
            'title' => 'Cancelled Subscription',
            'body' => 'Your Subscription is cancelled successfully',
        ];

        Mail::to(auth('web')->user()->email)->send(new SubscriptionCancel($detail));

        session()->flash('success-msg','Subscription Cancelled Successfully');

        return response()->json([
            'success' => 'Subscription Cancelled Successfully',
            'reload' => true,
        ]);

    }

    public function get_report(Request $request)
    {
        if (request()->ajax()) {
            $hisotry = new GptHistory();
            $typeQuery1 = new GptHistory;
            $typeQuery2 = new GptHistory;
            $typeQuery3 = new GptHistory;

            if (isset($request->daterange) && !empty($request->daterange)) {
                $daterage = explode(' - ', $request->daterange);
                $dateS = new Carbon($daterage[0]);
                $dateE = new Carbon($daterage[1]);
                $hisotry = $hisotry->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);

                $typeQuery1 = $typeQuery1->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);
                $typeQuery2 = $typeQuery2->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);

                $typeQuery3 = $typeQuery3->whereBetween('created_at', [$dateS->format('Y-m-d') . " 00:00:00", $dateE->format('Y-m-d') . " 23:59:59"]);

            }

            if (isset($request->id) && !empty($request->id)) {
                $hisotry = $hisotry->where('user_id', hashids_decode($request->id));
                $userPackage = UserPackage::where('user_id', hashids_decode($request->id))->latest()->first();

                $typeQuery1 = $typeQuery1->where('user_id', hashids_decode($request->id));
                $typeQuery2 = $typeQuery2->where('user_id', hashids_decode($request->id));
                $typeQuery3 = $typeQuery3->where('user_id', hashids_decode($request->id));
            }

            // condition for remain words
            if ($hisotry->sum('total_words') > 0) {
                if (isset($userPackage) && isset($userPackage->words)) {
                    $remain_words =  $userPackage->words - $hisotry->sum('total_words');
                    if ($remain_words < 0) {
                        $remain_words = 0;
                    }

                    if ($hisotry->sum('total_words') > $userPackage->words) {
                        $total_words = $userPackage->words;
                    }else{
                        $total_words = $hisotry->sum('total_words') ?? 0;
                    }
                }else{
                    $remain_words = $userPackage->words ?? 5000;
                    $total_words = $hisotry->sum('total_words') ?? 0;
                }

            }else{
                $total_words = 0;
            }



            return response()->json([
                'total_req' => $hisotry->count() > 0 ? $hisotry->count() : 0,
                // 'total_words' => $hisotry->sum('total_words') > 0 ? $hisotry->sum('total_words') : 0,
                // 'remain_words' => $hisotry->sum('total_words') > 0 ? (isset($userPackage) && isset($userPackage->words) ? $userPackage->words : 5000) - $hisotry->sum('total_words') : 5000,
                'ai_assistants' => $typeQuery2->where('type', '!=', 'template')->count(),
                'total_words' => $total_words,
                'remain_words' => $remain_words,
                'templates' => $typeQuery1->where('type', 'template')->count(),
                'chatbot' => $typeQuery1->where('type', 'chatbot')->count(),
            ]);
        }
    }
}
