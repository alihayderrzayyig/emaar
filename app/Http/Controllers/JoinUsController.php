<?php

namespace App\Http\Controllers;

use App\Http\Requests\joinUsRequest;
use App\JoinUs;
use App\Notifications\NewJoinUsAdded;
use App\User;

class JoinUsController extends Controller
{
    //

    public function store(joinUsRequest $request)
    {

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

        if ($resultJson->score >= 0.6) {
            // if ($resultJson->success == true) {
            // dd($data);
            $j = JoinUs::create([
                'name'          => $request->name,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'governorate'   => $request->governorate,
                'district'      => $request->district,
                'region'        => $request->region,
                'description'   => $request->description,
            ]);

            $users = User::where('isAdmin', 1)->get();
            foreach ($users as $i) {
                $i->notify(new NewJoinUsAdded($j));
            }

            session()->flash('success', 'تمة عملية الارسال بنجاح');
            return \redirect()->back();
        } else {
            session()->flash('error', 'ReCaptcha Error');
            return \redirect()->back();
        }
    }
}
