<?php

namespace App\Http\Controllers;

use App\Http\Requests\joinUsRequest;
use App\JoinUs;
use Dotenv\Validator;
use Illuminate\Http\Request;

class JoinUsController extends Controller
{
    //

    public function store(joinUsRequest $request){

        JoinUs::create([
            'name'          =>$request->name,
            'phone'         =>$request->phone,
            'email'         =>$request->email,
            'governorate'   =>$request->governorate,
            'district'      =>$request->district,
            'region'        =>$request->region,
            'description'   =>$request->description,
        ]);

        session()->flash('success', 'تمة عملية الارسال بنجاح');

        return \redirect()->back();

    }
}
