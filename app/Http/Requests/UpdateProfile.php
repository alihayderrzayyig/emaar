<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'phone'         => ['required' , 'regex:/^0*7(7|8|9|5)\d{8}$/', 'max:11', 'min:10'],
            'birthdate'     => 'required|date',
            'governorate'   => 'required|integer',
            'district'      => 'required|integer',
            'region'        => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'الاسم مطلوب',
            'phone.required'    => 'حقل الهاتف مطلوب',
            'regex'             => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'max'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'min'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
        ];
    }
}
