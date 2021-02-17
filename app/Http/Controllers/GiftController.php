<?php

namespace App\Http\Controllers;

use App\Governorate;
use App\Http\Requests\GiftRequest;
use App\Situation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('gift.create', ['governorates'=>$governorates]);
    }
    public function create2(Situation $situation)
    {
        $governorates = Governorate::all();
        return view('situation.show',[
            'situation'=>$situation,
            'governorates'=>$governorates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftRequest $request)
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
        if ($resultJson->success != true) {
            return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        }

        // dd($resultJson);

        if ($resultJson->score >= 0.6) {
        // if ($resultJson->success == true) {
            // dd($data);
            if(Auth::check()){
                if(isset($request->situation_id)){
                    $situation_id = $request->situation_id;
                }else{
                    $situation_id = null;
                }
                Auth::user()->gifts()->create([
                    'situation_id'  => $situation_id,
                    'name'          => $request->name,
                    'phone'         => $request->phone,
                    'gift'          => $request->gift,
                    'governorate'   => $request->governorate,
                    'district'      => $request->district,
                    'region'        => $request->region,
                    'description'   => $request->description,
                ]);
                session()->flash('success', 'تمة عملية الارسال بنجاح');
            }

            return \redirect()->back();
            //Validation was successful, add your form submission logic here
            // return back()->with('message', 'Thanks for your message!');
        } else {
            session()->flash('error', 'ReCaptcha Error');
            // return back()->withErrors(['captcha' => 'ReCaptcha Error']);
            return \redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
