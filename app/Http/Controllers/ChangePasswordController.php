<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;

use App\Rules\MatchOldPassword;

use Illuminate\Support\Facades\Hash;

use App\User;

class ChangePasswordController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');
    }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function store(PasswordRequest $request)
    {
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        
        return response()->json(['success' => 'Data is successfully added']);
    }
}
