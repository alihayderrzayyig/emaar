<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Providers\RouteServiceProvider;
use App\SocialProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

         /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        // dd($provider);
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        Try{
            $socialuser = Socialite::driver($provider)->user();
        }catch(\Exception $error){
            return redirect('/');
        }


        // dd($socialuser->getId());
        $socialprovider = SocialProvider::where('provider_id',$socialuser->getId())->where('provider',$provider)->first();

        // dd($socialprovider);

        if(!$socialprovider){

            $user = User::create([
                'name'      => $socialuser->getName(),
                'email'     => $socialuser->getEmail(),
                // 'phone'     => '07829386530',
                // 'password'  => Hash::make('password'),
            ]);

            // dd('ttttttt');

            $user->profile()->create();

            $user->socialProviders()->create([
                'provider_id' =>$socialuser->getId(),
                'provider'=>$provider,
            ]);

        }else{
            $user = $socialprovider->user;
        }

        // auth()->login($user);

        // if( auth()->user()->profile->copleted == false){
        //     return redirect()->route('profile-completed',[auth()->user()->profile->id]);
        // }else{
        //     return redirect()->route('home');
        // }


        auth()->login($user);
        return redirect()->route('home');


        // dd($user);
        // $user->token;
    }
}
