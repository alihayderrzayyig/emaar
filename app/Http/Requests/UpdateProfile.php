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
            'name'          => 'required|string|min:11|max:75|regex:/^[\p{L} ]+$/u',
            'phone'         => ['required' , 'regex:/^0*7(7|8|9|5)\d{8}$/', 'max:11', 'min:10'],
            'birthdate'     => ['required', 'date', 'before:12 years ago'],
            'governorate'   => 'required|integer',
            'district'      => 'required|integer',
            'region'        => 'required|string|min:3|max:255|regex:/^[\p{L} ]+$/u',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'الاسم مطلوب',
            'name.string'       => 'حقل الاسم يجب ان يكون نص فقط',
            'name.min'          => 'الاسم يجب ان لايقل عن 11 حرف',
            'name.max'          => 'الاسم يجب ان لا يزيد عن 75 حرف',
            'name.regex'        => 'الاسم يجب ان يتكون من الاحرف والمسافات فقط',

            'phone.required'          => 'حقل الهاتف مطلوب',
            'phone.regex'             => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'phone.max'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'phone.min'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',


            'birthdate.required'           => 'الرجاء من الختيار تاريخ الميلاد',
            'birthdate.date'               => 'يرجا اختيار تاريخ الميلاد بشكل صحيح',
            'birthdate.before'             => 'لا يسمح لمن هم اصغر من ال 12 سنة بالتسجيل',


            'governorate.required'           => 'يرجا اختيار محافظة',
            'governorate.integer'            => 'يرجا اختيار محافظة',
            'district.required'              => 'يرجا اختيار مدينة',
            'district.integer'               => 'يرجا اختيار مدينة',

            'region.required'       => 'حقل منطقة/ناحية مطلوب',
            'region.string'         => 'حقل منطقة/ناحية يجب ان يحنوي على نص',
            'region.min'            => 'حقل منطقة/ناحية يجب ان لا يقل عن 3 حروف',
            'region.max'            => 'حقل منطقة/ناحية يجب ان لا يزيد عن 255 حروف',
            'region.regex'          => 'حقل منطقة/ناحية يجب ان يتكوت من كلمات فقط',
        ];
    }
}
