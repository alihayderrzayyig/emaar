<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:22', 'confirmed'],
        ], [
            'name.required' => 'يجب ادخال اسم المستخدم',
            'name.string' => 'الاسم مطلوب',
            'name.max' => 'يجب الايزيد اسم المستخدم عن 255 حرف',

            'email.required' => 'يجب ادخال البريد الالكتروني',
            // 'email.string' => 'الاسم مطلوب',
            'email.email' => 'ادخل البريد الالكتروني بشكل صحيح',
            'email.max' => 'يجب الايزيد البريد الالكتروني عن 255 حرف',
            'email.unique' => 'البريد الالكتروني مستخدم بالفعل',

            'password.required' => 'يجب ادخال الرقم السري',
            'password.min' => 'يجب ان يتكون الرقم السري على الاقل من 8 رموز',
            'password.max' => 'يحب الايزيد الرقم السري على 22 رمز',
            'password.confirmed' => 'كلمة السر غير متطابقة',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data_recaptcha = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $data['recaptcha'],
            'remoteip' => $remoteip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data_recaptcha)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);


        if ($resultJson->score >= 0.6) {
            // if ($resultJson->success == true) {
            // dd($data);
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'slug' => SlugService::createSlug(User::class, 'slug', $data['name'],),
                'password' => Hash::make($data['password']),
            ]);
            //Validation was successful, add your form submission logic here
            // return back()->with('message', 'Thanks for your message!');
        } else {
            session()->flash('error', 'ReCaptcha Error');
            // return back()->withErrors(['captcha' => 'ReCaptcha Error']);
            return \redirect()->back();
        }
    }
}
