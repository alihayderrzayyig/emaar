<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Governorate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSituationRequest;
use App\Http\Requests\Admin\UpdateSituationRequest;
use App\Situation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminSituationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkIsAdmin']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $situations = Situation::where('id', 'LIKE', $search)
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->where('status', 1)
                ->paginate(30);
        } else {
            // $users = User::orderBy('name')->paginate(30);
            $situations = Situation::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(30);
        }


        // dd(Situation::where('status',0)->get()->count());
        $situationAccept = Situation::where('status', 0)->get()->count();
        $situationCount = Situation::where('status', 1)->get()->count();

        return \view('admin.situation.index', [
            'situations' => $situations,
        ])
        ->with('situationCount', $situationCount)
        ->with('situationAccept', $situationAccept);
    }


    // public function situationAccept()
    // {
    //     $DisplayButton=true;
    //     $situationAccept = Situation::where('status',0)->get()->count();
    //     $situations = Situation::where('status',0)->get();
    //     return \view('admin.situation.index',['situations'=>$situations])->with('situationAccept', $situationAccept)->with('DisplayButton', $DisplayButton);
    // }

    public function waitingForApproval()
    {
        $DisplayButton = true;

        $search = request()->query('search');
        if ($search) {
            $situations = Situation::where('id', 'LIKE', $search)
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->where('status', 0)
                ->paginate(30);
        } else {
            // $users = User::orderBy('name')->paginate(30);
            // $situations = Situation::where('status', 1)->paginate(30);
            $situations = Situation::where('status', 0)->paginate(30);
        }

        $situationAccept = Situation::where('status', 0)->get()->count();
        $situationCount = Situation::where('status', 1)->get()->count();

        return \view('admin.situation.index', ['situations' => $situations])
            ->with('situationCount', $situationCount)
            ->with('situationAccept', $situationAccept)
            ->with('DisplayButton', $DisplayButton)
            ->with('accept', true);
    }


    public function agree(Situation $situation)
    {
        $date['status'] = 1;
        $situation->update($date);
        session()->flash('success', 'تمة اضافة الحالة بنجاح');
        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // \dd('tttttttt');
        $governorates = Governorate::all();
        return view('admin.situation.create', ['governorates' => $governorates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSituationRequest $request)
    {

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/situation/', $filename);

            $img2 = Image::make('img/situation/' . $filename)->resize(600, 500);
            $img2->save();

            $date['image'] = 'img/situation/' . $filename;
        }

        Auth::user()->situations()->create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'governorate'   => $request->governorate,
            'district'      => $request->district,
            'region'        => $request->region,
            'status'        => 1,
            'money'         => $request->money,
            'image'         => 'img/situation/' . $filename,
            'description'   => $request->description,
        ]);

        session()->flash('success', 'تمة اضافة الحالة بنجاح');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $situation = Situation::findOrFail($id);
        $governorate = Governorate::findOrFail($situation->governorate);
        $district = District::findOrFail($situation->district);
        return \view('admin.situation.show', [
            'situation'     => $situation,
            'governorate'   => $governorate,
            'district'      => $district,
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
        $situation = Situation::findOrFail($id);
        $governorates = Governorate::all();
        $districts = District::where('governorate_id', $situation->governorate)->get();
        return view('admin.situation.create', [
            'situation'     => $situation,
            'governorates'  => $governorates,
            'districts'     => $districts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSituationRequest $request, $id)
    {
        $situation = Situation::findOrFail($id);
        $date = $request->only([
            'name',
            'phone',
            'governorate',
            'district',
            'region',
            'money',
            'description',
            'status',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/situation/', $filename);

            $img2 = Image::make('img/situation/' . $filename)->resize(600, 500);
            $img2->save();

            $date['image'] = 'img/situation/' . $filename;
        }

        $situation->deleteImage();
        $situation->update($date);

        session()->flash('success', 'تم تحديث البيانات بنجاح');

        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $situation = Situation::findOrFail($id);
        $situation->deleteImage();
        $situation->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return \redirect()->route('admin.situation.index');
    }

    public function addGift(Request $request, $id)
    {

        $situation = Situation::findOrFail($id);
        $oldval = $situation->achieve;
        $newval = $oldval + $request->money;
        $date['achieve'] = $newval;
        $situation->update($date);


        session()->flash('success', 'تمة عملة الاضافة بنجاح');
        return \redirect()->back();
    }
}
