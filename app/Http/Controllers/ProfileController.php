<?php

namespace App\Http\Controllers;

use App\District;
use App\Governorate;
use App\Http\Requests\CompletedProfile;
use App\Http\Requests\UpdateProfile;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function show(User $user){
        $governorate =Governorate::where('id', $user->profile->governorate)->first();
        $district = District::where('governorate_id', $user->profile->governorate)->where('id', $user->profile->district)->first();
        return view('profile.index', ['user'=>$user, 'governorate'=>$governorate , 'district'=>$district]);
    }

    public function editImage(User $user, Request $request){
        $date = $user->profile->only(['avatar']);

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().Auth::user()->id.'.'.$extension;
            $file->move('img/user/', $filename);

            $img2 = Image::make('img/user/'.$filename)->resize(300, 200);
            $img2->save();

            $date['avatar'] = 'img/user/'.$filename;
        }

        //تحديث البيانات
        $user->profile->deleteImage();
        $user->profile->update($date);
        // return $user->profile;
        return redirect()->back();
    }

    public function edit(User $user){
        // dd('TTTTTT');
        if(Auth::user()->id === $user->id){
            return view('profile.edit',[
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
            abort(404);
        }

    }

    public function complete(Profile $profile){
        return \view('auth.registerProfile',['governorates' =>Governorate::all(), 'profile'=>$profile]);
    }

    public function storeComplete(Profile $profile, CompletedProfile $request){

        $date = $profile->only(['phone','birthdate','governorate','district', 'completed', 'region']);

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
