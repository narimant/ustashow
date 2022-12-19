<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Socialite;

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


    public function redirectToProvider()
    {
      //$redirectUrl = "https://ustashow.com/tr/login/google/callback";
             $local=app()->getLocale();
        config(['services.google.redirect' => 'https://ustashow.com/'.$local.'/login/google/callback']);

       return Socialite::driver('google')->redirect();
              
// return Socialite::driver('google')->redirectUrl($redirectUrl)->redirect();
      // return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
              $local=app()->getLocale();
        config(['services.google.redirect' => 'https://ustashow.com/'.$local.'/login/google/callback']);
        $user = Socialite::driver('google')->user();
        $userfind=User::whereEmail($user->getEmail())->first();

        if(!$userfind)
        {
          $userfind=User::create([
              'name'=>$user->getName(),
              'email'=>$user->getEmail(),
              'email_verified_at'=>'12:09',
              'password'=>Hash::make($user->getId())

          ]);
        }

        auth()->loginUsingId($userfind->id);
        return redirect('/');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response'=>'recaptcha'
        ]);
    }


    public function showLoginForm()
    {
        SEOMeta::setTitle(__('messages.Login'));
        SEOMeta::setDescription(__('messages.Login'));
        SEOMeta::addKeyword(__('messages.Login'));
        return view('auth.login');
    }

}
