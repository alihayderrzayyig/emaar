<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'phone'         => ['required', 'regex:/^0*7(7|8|9|5)\d{8}$/', 'max:11', 'min:10'],
            'email'         => 'required|email|unique:users|min:12|max:50',
            'birthdate'     => ['required', 'date', 'before:12 years ago'],
            'password'      => 'required|confirmed|min:8|max:22',
            'governorate'   => 'required|integer',
            'district'      => 'required|integer',
            'region'        => 'required|string|min:3|max:255|regex:/^[\p{L} ]+$/u',
            'image'         => 'sometimes|required|image',
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

            'email.required'        => 'البريد الالكتروني مطلوب',
            'email.email'           => 'تأكد من ادخال البريد الالكتروني بشكل طحيح',
            'email.min'             => 'يجب ان لا يقل البريد الالكتروني عن 12 حرف',
            'email.max'             => 'يجب ان لا يزيد البريد الالكتروني عن 50 حرف',
            'email.unique'          => 'البريد الالكتروني مستخدم بالفعل',

            'birthdate.required'               => 'الرجاء من الختيار تاريخ الميلاد',
            'birthdate.date'               => 'يرجا اختيار تاريخ الميلاد بشكل صحيح',
            'birthdate.before'               => 'لا يسمح لمن هم اصغر من ال 12 سنة بالتسجيل',

            'password.required'               => 'يرجا ادخال كلمة السر',
            'password.confirmed'               => 'كلمة السر غير متطابقة',
            'password.min'               => 'كلمة السر يجب الا تقل عن 8 رموز',
            'password.max'               => 'كلمة السر يجب الا تزيد عن 22 رموز',

            'governorate.required'   => 'عليك اختيار محافضة.',
            'governorate.integer'   => 'عليك اختيار محافضة.',

            'district.required'      => 'عليك اختيار قضاء معين',
            'district.integer'      => 'عليك اختيار قضاء معين',

            'image.required'    => 'يجب ان تختار صورة',
            'image.image'       => 'يجب ان تختار صورة',

            'region.required'       => 'حقل منطقة/ناحية مطلوب',
            'region.string'         => 'حقل منطقة/ناحية يجب ان يحنوي على نص',
            'region.min'            => 'حقل منطقة/ناحية يجب ان لا يقل عن 3 حروف',
            'region.max'            => 'حقل منطقة/ناحية يجب ان لا يزيد عن 255 حروف',
            'region.regex'          => 'حقل منطقة/ناحية يجب ان يتكوت من كلمات فقط',
        ];
    }
}
