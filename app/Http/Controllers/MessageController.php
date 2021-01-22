<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        Message::create([
            'name'          =>$request->name,
            'phone'         =>$request->phone,
            'email'         =>$request->email,
            'description'   =>$request->description,
        ]);
        return \redirect()->back();
    }
}
