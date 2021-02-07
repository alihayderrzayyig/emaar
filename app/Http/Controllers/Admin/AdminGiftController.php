<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Gift;
use App\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGiftController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','checkIsAdmin']);
    }

    public function index(){
        $gifts = Gift::all();
        $governorates = Governorate::all();
        $districts = District::all();
        return view('admin.gift.index',[
            'gifts' => $gifts,
            'governorates' => $governorates,
            'districts' => $districts,
        ]);
    }


    public function destroy(Gift $Gift){
        $Gift->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        // return \redirect()->route('admin-message.index');
        return \redirect()->back();
    }


    // public function show(Gift $gift){
    //     // return $gift;
    //     // $gifts = Gift::all();

    //     $governorates = Governorate::all();
    //     $districts = District::all();
    //     return view('admin.gift.show',[
    //         'gifts' => $gifts,
    //         'governorates' => $governorates,
    //         'districts' => $districts,
    //     ]);
    // }


}
