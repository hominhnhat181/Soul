<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\AuthService;
use Socialite;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    private $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function __construct(AuthService $authService)
    {
        $this->middleware('guest');
        $this->authService = $authService;

    }


    public function redirectRegisterProvider($provider){
        session(['auth' => 'register']);
        return \Socialite::driver($provider)->redirect();
    }


    public function callbackRegister($provider)
    {
        $redirectSession = session('auth');

        $msgErr = ['error' => __('auth.user_not_exist')];
        // login social
        if($redirectSession == 'login'){
            $user = $this->authService->getUserSocial(Socialite::driver($provider)->user(), $provider);
            if($user){
                auth()->login($user);
                return redirect()->route('home');
            }
            return redirect()->route('login')->with($msgErr);
        }

        // register social
        $user = $this->authService->createUserSocial(Socialite::driver($provider)->user(), $provider);
        if($user){
            auth()->login($user);
            return redirect()->route('my-profile')->with(['user' => $user]);
        }
        $msgErr['error'] = __('auth.user_already_exist');
        return redirect()->route('register')->with($msgErr);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
