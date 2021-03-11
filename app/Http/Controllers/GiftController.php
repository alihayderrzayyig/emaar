<?php

namespace App\Http\Controllers;

use App\Governorate;
use App\Http\Requests\GiftRequest;
use App\Notifications\NewGiftAdded;
use App\Situation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        $this->middleware(['auth', 'verified'])->only(['store']);
    }



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
        return view('gift.create', ['governorates' => $governorates]);
    }

    public function create2(Situation $situation)
    {
        $governorates = Governorate::all();
        return view('situation.show', [
            'situation' => $situation,
            'governorates' => $governorates
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

        if ($resultJson->score >= 0.6) {
            if (Auth::check()) {
                if (isset($request->situation_slug)) {
                    $situation = Situation::where('slug', '=', $request->situation_slug)->firstOrFail();
                    $situation_id = $situation->id;
                } else {
                    $situation_id = null;
                }
                $g = Auth::user()->gifts()->create([
                    'situation_id'  => $situation_id,
                    'name'          => $request->name,
                    'phone'         => $request->phone,
                    'gift'          => $request->gift,
                    'governorate'   => $request->governorate,
                    'district'      => $request->district,
                    'region'        => $request->region,
                    'description'   => $request->description,
                ]);

                $users = User::where('isAdmin', 1)->get();
                foreach ($users as $i) {
                    $i->notify(new NewGiftAdded($g));
                }
            }


            session()->flash('success', 'تمة عملية الارسال بنجاح');
            return \redirect()->back();
        } else {
            session()->flash('error', 'ReCaptcha Error');
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
