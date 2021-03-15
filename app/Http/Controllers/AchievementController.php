<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    public function index()
    {
        $branches = DB::table('branches')
            ->orderByDesc('created_at')
            ->select('title', 'body', 'image')
            ->take('4')
            ->get();

        $projects = DB::table('projects')
            ->orderByDesc('created_at')
            ->select('title', 'body', 'image')
            ->take('6')
            ->get();

        return \view('achievements', [
            'branches' => $branches,
            'projects' => $projects,
        ]);
    }

    public function allProjects()
    {
        $projects = DB::table('projects')
            ->orderByDesc('created_at')
            ->select('title', 'body', 'image')
            ->paginate(4);
        return view('allProjects', [
            'projects' => $projects,
        ]);
    }
}
