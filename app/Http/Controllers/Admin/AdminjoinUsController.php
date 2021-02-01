<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Governorate;
use App\Http\Controllers\Controller;
use App\JoinUs;
use Illuminate\Http\Request;

class AdminjoinUsController extends Controller
{
    public function index(){
        $JoinUsmessages = JoinUs::all();
        $governorates = Governorate::all();
        $districts = District::all();
        return view('admin.joinUs.index', [
            'JoinUsmessages'=>$JoinUsmessages,
            'governorates'=>$governorates,
            'districts'=>$districts,
        ]);
    }


    public function destroy(JoinUs $joinus){
        $joinus->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return \redirect()->route('admin-joinus.index');
    }
}
