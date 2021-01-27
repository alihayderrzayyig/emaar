<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Project;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index(){
        $branches = Branch::where('show',1)->get();
        $projects = Project::where('show',1)->get();
        return \view('achievements',[
            'branches' => $branches,
            'projects' => $projects,
        ]);
    }
}
