<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Message;
use App\Notifications\NewMessageAdded;
use App\User;
class MessageController extends Controller
{
    public function store(MessageRequest $request){

        // dd($request->recaptcha);
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data_recaptcha = [
                'secret' => config('services.recaptcha.secret'),
                'response' => $request->recaptcha,
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
        // if ($resultJson->success != true) {
        //     return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        // }

        // dd($resultJson);

        if ($resultJson->score >= 0.6) {
        // if ($resultJson->success == true) {
            // dd($data);
            $m = Message::create([
                'name'          =>$request->com_name,
                'phone'         =>$request->com_phone,
                'email'         =>$request->com_email,
                'description'   =>$request->com_description,
            ]);

            $users = User::where('isAdmin', 1)->get();
            foreach($users as $i){
                $i->notify(new NewMessageAdded($m));
            }
            // User::where('isAdmin', 1)->notify(new \App\Notifications\NewMessageAdded($m));

            session()->flash('success', 'تمة عملة الارسال بنجاح');
            return \redirect()->back();
                //Validation was successful, add your form submission logic here
                // return back()->with('message', 'Thanks for your message!');
        } else {
            session()->flash('error', 'ReCaptcha Error');
            // return back()->withErrors(['captcha' => 'ReCaptcha Error']);
            return \redirect()->back();
        }


    }
}
