<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPackage;
use Socialite;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback()
    {
        $provider = 'google';
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        if ($provider == 'facebook') {
            $existingUser = User::where('email', $user->email)->first();
        }else{
            $existingUser = User::where('email', $user->getEmail())->first();
        }
        if ($existingUser) {
            if (session()->has('offset')) {
                $offset = session()->get('offset');
                $existingUser->time_zone = $offset;
                $existingUser->save();
            }
            auth('web')->login($existingUser, true);
        } else {
            if ($provider == 'facebook') {
                $userName = explode(' ',$user->name);
                $newUser                    = new User;
                $newUser->provider_name     = $provider;
                $newUser->provider_id       = $user->id;
                $newUser->first_name        = @$userName[0];
                $newUser->last_name        = @$userName[1];
                $newUser->email             = $user->email;
                $newUser->unique_id = mt_rand(111111,999999);
                $newUser->email_verified_at = now();
                // $newUser->img            = $user->avatar;
                $newUser->save();
                if (session()->has('offset')) {
                    $offset = session()->get('offset');
                    $newUser->time_zone = $offset;
                    $newUser->save();
                }
            }else{
                $userName = explode(' ',$user->name);

                $newUser                    = new User;
                $newUser->provider_name     = $provider;
                $newUser->provider_id       = $user->getId();
                $newUser->first_name        = @$userName[0];
                $newUser->last_name        = @$userName[1];
                $newUser->email             = $user->getEmail();
                $newUser->unique_id = mt_rand(111111,999999);
                // we set email_verified_at because the user's email is already veridied by social login portal
                $newUser->email_verified_at = now();
                // you can also get avatar, so create avatar column in database it you want to save profile image
                // $newUser->img            = $user->getAvatar();
                $newUser->save();
                if (session()->has('offset')) {
                    $offset = session()->get('offset');
                    $newUser->time_zone = $offset;
                    $newUser->save();
                }
            }
            auth('web')->login($newUser, true);

            $package = Package::where('plan_code','FRP0')->first();
            if (!empty($package)) {
                $userPackage = new UserPackage();
                $newUser = new User;
                $userPackage->user_id = Auth::user()->id;
                $userPackage->package_id = $package->id;
                $userPackage->words = $package->words;
                $userPackage->start_date = now()->format('Y-m-d');
                $userPackage->end_date =  now()->addDays(7)->format('Y-m-d');
                $userPackage->save();
            }

        }

        session()->forget('offset');

        return redirect()->route('login');
    }
    
    // public function handleProviderCallback($provider)
    // {
    //     try {
    //         $user = Socialite::driver($provider)->user();
    //     } catch (\Exception $e) {
    //         return redirect()->route('login');
    //     }

    //     if ($provider == 'facebook') {
    //         $existingUser = User::where('email', $user->email)->first();
    //     }else{
    //         $existingUser = User::where('email', $user->getEmail())->first();
    //     }
    //     if ($existingUser) {
    //         if (session()->has('offset')) {
    //             $offset = session()->get('offset');
    //             $existingUser->time_zone = $offset;
    //             $existingUser->save();
    //         }
    //         auth('web')->login($existingUser, true);
    //     } else {
    //         if ($provider == 'facebook') {
    //             $userName = explode(' ',$user->name);
    //             $newUser                    = new User;
    //             $newUser->provider_name     = $provider;
    //             $newUser->provider_id       = $user->id;
    //             $newUser->first_name        = @$userName[0];
    //             $newUser->last_name        = @$userName[1];
    //             $newUser->email             = $user->email;
    //             $newUser->unique_id = mt_rand(111111,999999);
    //             $newUser->email_verified_at = now();
    //             // $newUser->img            = $user->avatar;
    //             $newUser->save();
    //             if (session()->has('offset')) {
    //                 $offset = session()->get('offset');
    //                 $newUser->time_zone = $offset;
    //                 $newUser->save();
    //             }
    //         }else{
    //             $userName = explode(' ',$user->name);

    //             $newUser                    = new User;
    //             $newUser->provider_name     = $provider;
    //             $newUser->provider_id       = $user->getId();
    //             $newUser->first_name        = @$userName[0];
    //             $newUser->last_name        = @$userName[1];
    //             $newUser->email             = $user->getEmail();
    //             $newUser->unique_id = mt_rand(111111,999999);
    //             // we set email_verified_at because the user's email is already veridied by social login portal
    //             $newUser->email_verified_at = now();
    //             // you can also get avatar, so create avatar column in database it you want to save profile image
    //             // $newUser->img            = $user->getAvatar();
    //             $newUser->save();
    //             if (session()->has('offset')) {
    //                 $offset = session()->get('offset');
    //                 $newUser->time_zone = $offset;
    //                 $newUser->save();
    //             }
    //         }

    //         $package = Package::where('plan_code','FRP0')->first();
    //         if (!empty($package)) {
    //             $userPackage = new UserPackage();
    //             $userPackage->user_id = $user->id;
    //             $userPackage->package_id = $package->id;
    //             $userPackage->words = $package->words;
    //             $userPackage->start_date = now()->format('Y-m-d');
    //             $userPackage->end_date =  now()->addDays(7)->format('Y-m-d');
    //             $userPackage->save();
    //         }
    //         auth('web')->login($newUser, true);

    //     }

    //     session()->forget('offset');

    //     return redirect()->route('login');
    // }
}
