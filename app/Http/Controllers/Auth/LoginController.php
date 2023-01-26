<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    use AuthenticatesUsers;

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

    public function loginSocial($socNet) {
        if (Auth::check()) return redirect()->route('home');

        return Socialite::driver($socNet)->redirect();
    }

    public function responseVK(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::driver('vkontakte')->user();

            $userInSystem = $userRepository->getUserBySocId($user, 'vk');
            Auth::login($userInSystem);
        }

        return redirect()->route('home');
    }


    public function responseGithub(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::driver('github')->user();

            $userInSystem = $userRepository->getUserBySocId($user, 'github');
            Auth::login($userInSystem);
        }

        return redirect()->route('home');
    }
}
