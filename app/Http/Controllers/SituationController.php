<?php

namespace App\Http\Controllers;

use App\Governorate;
use App\Http\Requests\SituationRequest;
use App\Notifications\NewSituationAdded;
use App\Situation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class SituationController extends Controller
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
        $filter = request()->query('filter');
        $sort = null;
        if (request()->query('sort')) {
            // dd(request()->query('sort'));
            $sort = 'DESC';
        } else {
            $sort = 'ASC';
        }

        if ($filter) {
            $situations = Situation::where('status', 1)
                ->orderBy($filter, $sort)
                ->paginate(20);
        } else {
            $situations = Situation::where('status', 1)
                ->orderBy('created_at', 'DESC')
                ->paginate(20);
        }

        return view('situation.index', ['situations' => $situations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = DB::table('governorates')->get();
        return view('situation.create', ['governorates' => $governorates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SituationRequest $request)
    {
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



        if ($resultJson->score >= 0.6) {

            $image = $request->image->store('situations');
            // تعديل الصورة
            $img2 = Image::make('storage/' . $image)->resize(600, 500);
            //حفظ الصورة الجديدة بنفس الاسم والمكان
            $img2->save();

            $s = Auth::user()->situations()->create([
                'name'          => $request->name,
                'phone'         => $request->phone,
                'governorate'   => $request->governorate,
                'district'      => $request->district,
                'region'        => $request->region,
                'money'         => $request->money,
                'image'         => $image,
                'description'   => $request->description,
            ]);

            $users = User::where('isAdmin', 1)->get();
            foreach ($users as $i) {
                $i->notify(new NewSituationAdded($s));
            }


            session()->flash('success', 'تمة عملة الارسال بنجاح');
            return redirect()->back();
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
    public function show(Situation $situation)
    {
        $governorates = DB::table('governorates')->get();
        return view('situation.show', [
            'governorates' => $governorates,
            'situation' => $situation
        ]);
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


    public function give(Situation $situation)
    {
        return view('showSituation', ['situation' => $situation]);
    }
}
