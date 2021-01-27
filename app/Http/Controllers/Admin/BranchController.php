<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
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
    public function store(Request $request)
    {

        if(Auth::user()->isAdmin){
            if($request->hasFile('image')){
                $image=$request->image->store('branch');
            }

            Branch::create([
                'title'     => $request->title,
                'body'      => $request->body,
                'show'      => $request->show,
                'image'     => $image,
            ]);
        }

        return \redirect()->route('achievments');

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
    public function update(Request $request, Branch $branch)
    {
        // return $request;
        $date = $request->only(['title','body','show']);
        // return $date;
        if($request->hasFile('image')){
            $image=$request->image->store('branch');

            // Storage::delete($post->image);
            $branch->deleteImage();

            $date['image'] = $image;
        }

        $branch->update($date);

        // session()->flash('success', 'post updated success');

        return redirect(route('achievments'));
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
        return \redirect()->back();
    }
}
