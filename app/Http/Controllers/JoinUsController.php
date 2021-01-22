<?php

namespace App\Http\Controllers;

use App\JoinUs;
use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    //

    public function store(Request $request){
        // return($request);

        JoinUs::create([
            'name'          =>$request->name,
            'phone'         =>$request->phone,
            'email'         =>$request->email,
            'governorate'   =>$request->governorate,
            'district'      =>$request->district,
            'region'        =>$request->region,
            'description'   =>$request->description,
        ]);

        return \redirect()->back();

    }
}
