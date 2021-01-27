<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','checkIsAdmin']);
    }

    public function index(){
        return view('admin.index');
    }

    public function achievments(){
        $branches = Branch::where('show',true)->get();
        $projects = Project::where('show',true)->get();
        return view('admin.achievments',[
            'branches'  => $branches,
            'projects'  => $projects,
        ]);
    }
}
