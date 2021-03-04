<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompletedProfile extends FormRequest
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
            // 'name'          => 'required',
            'phone'         => ['required', 'regex:/^0*7(7|8|9|5)\d{8}$/', 'max:11', 'min:10'],
            // 'birthdate'     => 'required|date|before:5 years ago',
            'birthdate'     => ['required', 'date', 'before:12 years ago'],
            'governorate'   => 'required|integer',
            'district'      => 'required|integer',
            'region'        => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required'     => 'الاسم مطلوب',
            'phone.required'    => 'حقل الهاتف مطلوب',
            'phone.regex'       => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'phone.max'         => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'phone.min'         => 'تاكد من ادخال رقم هاتفك بشكل صحيح',


            'birthdate.required'    => 'الرجاء من الختيار تاريخ الميلاد',
            'birthdate.date'        => 'يرجا اختيار تاريخ الميلاد بشكل صحيح',
            'birthdate.before'      => 'لا يسمح لمن هم اصغر من ال 12 سنة بالتسجيل',


            'governorate.required'   => 'يرجا اختيار محافظة',
            'district.required'      => 'يرجا اختيار مدينة',
            'governorate.integer'    => 'يرجا اختيار محافظة',
            'district.integer'       => 'يرجا اختيار مدينة',
            'region.required'        => 'يرجا ادخال منطقة او ناحية',
        ];
    }
}
