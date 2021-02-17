<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index(){
        $messags = Message::all();
        return view('admin.message.index', [
            'messags'=>$messags,
        ]);
    }


    public function destroy(Message $message){
        $message->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return \redirect()->route('admin.message.index');
    }
}
