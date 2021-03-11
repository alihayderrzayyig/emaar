<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Governorate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
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
            // $users = User::with(['profile'])->where('name', 'LIKE', '%' . $search . '%')
            //     ->orWhere('email', 'LIKE', '%' . $search . '%')
            //     ->paginate(30);

            $users = DB::table('users')
                ->select('id', 'name', 'email', 'created_at')
                ->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->paginate(30);
        } else {
            // $users = User::with(['profile'])->orderBy('name')->paginate(30);
            $users = DB::table('users')
                ->select('id', 'name', 'email', 'created_at')
                ->paginate(30);
        }
        return view('admin.user.index', ['users' => $users])->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('admin.user.create', ['governorates' => $governorates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->isAdmin === 'on') {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }


        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'isAdmin'   => $isAdmin,
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . Auth::user()->id . '.' . $extension;
            $file->move('img/user/', $filename);

            $img2 = Image::make('img/user/' . $filename)->resize(300, 200);
            $img2->save();

            $image = 'img/user/' . $filename;
        } else {
            $image = 'img/user.png';
        }

        // if ($request->hasFile('image')) {
        //     //حفظ الصورة الجديدة
        //     $image = $request->image->store('profile');
        //     // تعديل الصورة
        //     $img2 = Image::make('storage/' . $image)->resize(300, 200);
        //     //حفظ الصورة الجديدة بنفس الاسم والمكان
        //     $img2->save();
        // } else {
        //     $image = 'img/user.png';
        // }

        $user->profile()->create([
            'phone'         => $request->phone,
            'governorate'   => $request->governorate,
            'district'      => $request->district,
            'region'        => $request->region,
            'birthdate'     => $request->birthdate,
            'avatar'        => $image,
            'completed'     => true,

        ]);

        session()->flash('success', 'تم اضافة المستخدم بنجاح');

        return redirect()->route('admin.users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $governorate = Governorate::where('id', $user->profile->governorate)->first();
        $district = District::where('id', $user->profile->district)->first();
        return view('admin.user.show', [
            'user'          => $user,
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
    public function edit(User $user)
    {
        $governorates = Governorate::all();
        $districts = District::where('governorate_id', $user->profile->governorate)->get();
        return view('admin.user.create', [
            'user' => $user,
            'governorates' => $governorates,
            'districts' => $districts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->isAdmin === 'on') {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }


        $date_user = $request->only(['name']);
        if ($request->email) {
            $date_user['email'] = $request->email;
        }

        if ($request->password) {
            $date_user['password'] = Hash::make($request->password);
        }

        $date_user['isAdmin'] = $isAdmin;

        $date_profile = $request->only([
            'phone',
            'birthdate',
            'governorate',
            'district',
            'region',
        ]);
        // if ($request->hasFile('image')) {
        //     $image = $request->image->store('profile');
        //     $user->profile->deleteImage();
        //     // تعديل الصورة
        //     $img2 = Image::make('storage/' . $image)->resize(300, 200);
        //     //حفظ الصورة الجديدة بنفس الاسم والمكان
        //     $img2->save();

        //     $date_profile['avatar'] = $image;
        // }


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . Auth::user()->id . '.' . $extension;
            $file->move('img/user/', $filename);

            $img2 = Image::make('img/user/' . $filename)->resize(300, 200);
            $img2->save();

            $date_profile['avatar'] = 'img/user/' . $filename;
        }



        $date_profile['completed'] = true;

        $user->update($date_user);
        $user->profile->deleteImage();
        $user->profile->update($date_profile);

        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->isAdmin && (Auth::user()->id != $user->id)) {
            $user->profile->deleteImage();
            $user->profile->delete();
            $user->delete();
            session()->flash('success', 'تمة عملة الحذف بنجاح');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
