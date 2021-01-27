<?php

namespace App\Http\Controllers;

use App\District;
use App\Governorate;
use App\Http\Requests\UpdateProfile;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function showe(){
        // dd(Route::hase());
        $user = Auth::user();
        $governorate =Governorate::where('id', $user->profile->governorate)->first();
        $district = District::where('governorate_id', $user->profile->governorate)->where('id', $user->profile->district)->first();
        return view('profile', ['user'=>$user, 'governorate'=>$governorate , 'district'=>$district]);
    }

    public function editImage(User $user, Request $request){

        $date = $user->profile->only(['address','birthdate']);

        if($request->hasFile('image')){
            //حفظ الصورة الجديدة
            $image=$request->image->store('profile');

            //اذا اكو صورة قديمة يتم مسحها
            if($user->profile->avatar !== 'img/user.png'){
                Storage::delete($user->profile->avatar);
            }

            //حفظ مسار الصورة الجديدة
            $date['avatar'] = $image;
        }

        //تحديث البيانات
        $user->profile->update($date);
        // return $user->profile;
        return redirect()->back();
    }

    public function edit(User $user){
        // dd('TTTTTT');
        if(Auth::user()->id === $user->id){
            return view('edit-profile',[
                'user'=>$user,
                'governorates' =>Governorate::all(),
                'districts' => District::all()
            ]);
        }

    }

    public function update(UpdateProfile $request,User $user){



        $user_date      = $user->only(['name']);
        $profile_date   = $user->profile->only(['phone','birthdate','governorate','district','region']);

        if (Auth::user()->id == $user->id) {
            // return $request;
            $user_date['name'] = $request->name;

            $profile_date['phone'] = $request->phone;
            $profile_date['birthdate'] = $request->birthdate;
            $profile_date['governorate'] = $request->governorate;
            $profile_date['district'] = $request->district;
            $profile_date['region'] = $request->region;

            $user->update($user_date);
            $user->profile->update($profile_date);

            session()->flash('success', 'تم تعديل بياناتك بنجاح');

            return \redirect()->back();
            # code...
        } else {
            # code...
        }

    }

    public function complete(Profile $profile){
        // return $profile->user->name;
        return \view('auth.registerProfile',['governorates' =>Governorate::all(), 'profile'=>$profile]);
    }

    public function storeComplete(Profile $profile, Request $request){
        // dd('fffffff');ur
        // $date = $user->profile->only(['phone','birthdate','governorate','district', 'region']);
        $date = $profile->only(['phone','birthdate','governorate','district', 'completed', 'region']);
        // $date;

        // $x="fffffff";
        // if(Auth::user()->id === $profile->user_id){
        //     $x='ttttttt';
        // }

        // dd($x);



        // dd(Auth::user()->id );
        // dd( $profile);

        if(Auth::user()->id === $profile->user_id){
            $date['phone'] = $request->phone;
            $date['birthdate'] = $request->birthdate;
            $date['governorate'] = $request->governorate;
            $date['district'] = $request->district;
            $date['region'] = $request->region;
            $date['completed'] = true;
            $profile->update($date);
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }

    }
}
