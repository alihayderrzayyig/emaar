<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBranchRequest;
use App\Http\Requests\Admin\UpdateBranchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminBranchController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','checkIsAdmin']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return \view('admin.branches.index',['branches'=>$branches]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchRequest $request)
    {

        // \dd($request);
        if(Auth::user()->isAdmin){
            if($request->hasFile('image')){
                $image=$request->image->store('branch');
                // تعديل الصورة
                $img2 = Image::make('storage/'.$image)->resize(600, 500);
                //حفظ الصورة الجديدة بنفس الاسم والمكان
                $img2->save();
            }

            Branch::create([
                'title'     => $request->title,
                'body'      => $request->body,
                'show'      => $request->show,
                'image'     => $image,
            ]);
        }

        session()->flash('success', 'تمة عملة الاضافة بنجاح');
        return \redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return \view('admin.branches.show', ['branch'=>$branch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return \view('admin.branches.create',['branch'=>$branch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        // return $request;
        $date = $request->only(['title','body','show']);
        // return $date;
        if($request->hasFile('image')){
            $image=$request->image->store('branch');
            // Storage::delete($post->image);
            $branch->deleteImage();

            // تعديل الصورة
            $img2 = Image::make('storage/'.$image)->resize(600, 500);
            //حفظ الصورة الجديدة بنفس الاسم والمكان
            $img2->save();

            $date['image'] = $image;
        }

        $branch->update($date);

        session()->flash('success', 'تمة عملة التحديث بنجاح');
        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->deleteImage();
        $branch->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return \redirect()->back();    }
}
