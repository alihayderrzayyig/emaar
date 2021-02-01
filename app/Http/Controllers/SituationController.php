<?php

namespace App\Http\Controllers;

use App\Governorate;
use App\Situation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SituationController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        $this->middleware(['auth'])->only(['store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $situations = Situation::where('status',1)->paginate(20);
        return view('situation.index',['situations'=>$situations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('situation.create', ['governorates'=>$governorates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validateWithBag('post', [
                'name'          => ['required', 'max:255'],
                'phone'         => ['required'],
                'governorate'   => ['required', 'integer'],
                'district'      => ['required', 'integer'],
                'region'        => ['required'],
                'money'         => ['required'],
                'image'         => ['required', 'image'],
                'description'   => ['required'],
            ]);

        // dd($request->image);

        $image=$request->image->store('situations');

        Auth::user()->situations()->create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'governorate'   => $request->governorate,
            'district'      => $request->district,
            'region'        => $request->region,
            'money'         => $request->money,
            'image'         => $image,
            'description'   => $request->description,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Situation $situation)
    {
        // return $situation;
        $governorates = Governorate::all();
        return view('situation.show',[
            'governorates'=>$governorates,
            'situation'=>$situation
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


    public function give(Situation $situation){
        return view('showSituation',['situation'=>$situation]);
    }
}
