<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'city' => $data['city'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // event(new Registered($user = $this->create($request->all())));

        $user = $this->create($request->all());
        $user->unique_id = mt_rand(111111,999999).now()->timestamp;
        $user->save();

        $package = Package::where('plan_code','FRP0')->first();
        if (!empty($package)) {
            $userPackage = new UserPackage();
            $userPackage->user_id = $user->id;
            $userPackage->package_id = $package->id;
            $userPackage->words = $package->words;
            $userPackage->start_date = now()->format('Y-m-d');
            $userPackage->end_date =  now()->addDays(7)->format('Y-m-d');
            $userPackage->save();
        }

        auth('web')->login($user);


        return redirect()->intended(url('/user/dashboard'));
    }

    public function showRegistrationForm(Request $request)
    {
        // $ip = $request->ip();
        // $ip = '48.188.144.248';
        $ip = request()->ip(); //Dynamic IP address get
        $currentUserInfo = \Location::get($ip);
        return view('auth.register', compact('currentUserInfo'));
    }
}
