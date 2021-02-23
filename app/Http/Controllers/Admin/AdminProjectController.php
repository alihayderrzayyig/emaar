<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminProjectController extends Controller
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
        $projects = Project::all();
        return \view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        if (Auth::user()->isAdmin) {
            // if($request->hasFile('image')){
            //     $image=$request->image->store('Project');
            //     // تعديل الصورة
            //     $img2 = Image::make('storage/'.$image)->resize(600, 500);
            //     //حفظ الصورة الجديدة بنفس الاسم والمكان
            //     $img2->save();
            // }
            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = time() . '.' . $extension;
                $file->move('img/project/', $filename);

                $img2 = Image::make('img/project/' . $filename)->resize(600, 500);
                $img2->save();

                $image = 'img/project/' . $filename;
            }

            Project::create([
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
    public function show(Project $project)
    {
        return \view('admin.projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return \view('admin.projects.create', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // return $request;
        $date = $request->only(['title', 'body', 'show']);
        // return $date;
        // if($request->hasFile('image')){
        //     $image=$request->image->store('branch');
        //     // Storage::delete($post->image);
        //     $project->deleteImage();
        //     // تعديل الصورة
        //     $img2 = Image::make('storage/'.$image)->resize(600, 500);
        //     //حفظ الصورة الجديدة بنفس الاسم والمكان
        //     $img2->save();

        //     $date['image'] = $image;
        // }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/project/', $filename);

            $img2 = Image::make('img/project/' . $filename)->resize(600, 500);
            $img2->save();

            $date['image'] = 'img/project/' . $filename;
        }

            $project->deleteImage();
        $project->update($date);

        session()->flash('success', 'تمة عملة التحديث بنجاح');
        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->deleteImage();
        $project->delete();
        return \redirect()->back();
    }
}
