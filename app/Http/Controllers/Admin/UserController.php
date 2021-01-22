<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','checkIsAdmin']);
    }


    public function index(){
        $users = User::orderBy('name')->paginate(50);
        return view('admin.users',['users'=>$users])->with('no', 1);
    }
}
