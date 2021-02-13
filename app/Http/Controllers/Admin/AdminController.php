<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Project;
use App\Responsible;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','checkIsAdmin']);
    }

    public function index(){
        $responsibles = Responsible::all();
        return view('admin.index', [
            'responsibles' => $responsibles,
        ]);
    }

    public function achievments(){
        $branches = Branch::where('show',true)->get();
        $projects = Project::where('show',true)->get();
        return view('admin.achievments',[
            'branches'  => $branches,
            'projects'  => $projects,
        ]);
    }

    public function editImage(Request $request){

        $request->validate([
            'image' => 'required|image',
        ]);

        if(\File::exists(public_path('img/'.$request->query('image')))){
            \file::delete(public_path('img/'.$request->query('image')));
        }else{
            // dd('File does not exists.');
        }

        $img = Image::make($request->image);

        switch($request->query('image')){
            case 'achievements01.jpg':
                $img->resize(550, 480);
                break;

            case 'achievements02.jpg':
                $img->resize(270, 320);
                break;

            case 'achievements03.jpg':
                $img->resize(270, 320);
                break;

            case 'achievements04.jpg':
                $img->resize(265, 480);
                break;

            case 'achievements05.jpg':
                $img->resize(265, 240);
                break;

            case 'achievements06.jpg':
                $img->resize(265, 240);
                break;
        }

        // finally we save the image as a new file
        $img->save('img/'.$request->query('image'));

        session()->flash('success', 'تمة عملة التحديت بنجاح');

        return \redirect()->back();
    }
}
