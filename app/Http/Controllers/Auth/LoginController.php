<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $a = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // if(substr($request->time_zone, 0, 1) == '-'){
        //     $time_zone = str_replace("-","+",$request->time_zone);
        // }else{
        //     $time_zone = '-'.$request->time_zone;
        // }

        // if($request->time_zone == 0){
        //     $time_zone = $request->time_zone;
        // }

        // if (session()->has('offset')) {
        //     session()->forget('offset');
        // }

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if (!empty($request->time_zone) || $request->time_zone == "0") {
            //     $user = User::find(auth('web')->id());
            //     $user->time_zone = $time_zone;
            //     $user->save();
            // }

            if (empty(auth('web')->user()->unique_id)) {
                $user = User::find(auth('web')->id());
                $user->unique_id =mt_rand(111111,999999).now()->timestamp;
                $user->save();
            }

            return redirect()->intended(url('/user/dashboard'));
        }

        return redirect()
            ->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }
}
