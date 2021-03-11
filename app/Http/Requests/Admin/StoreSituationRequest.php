<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSituationRequest extends FormRequest
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
            'governorate'   => 'required|integer',
            'district'      => 'required|integer',
            'region'        => 'required|string|min:3|max:255|regex:/^[\p{L} ]+$/u',
            'money'         => 'required|integer',
            'description'   => 'required|string|min:12|regex:/^[\p{L} ]+$/u',
            'image'         => 'required|image',
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

            'governorate.required'          => 'عليك اختيار محافضة.',
            'governorate.integer'           => 'عليك اختيار محافضة.',
            'district.required'             => 'عليك اختيار قضاء معين',
            'district.integer'              => 'عليك اختيار قضاء معين',

            'region.required'       => 'حقل منطقة/ناحية مطلوب',
            'region.string'         => 'حقل منطقة/ناحية يجب ان يحنوي على نص',
            'region.min'            => 'حقل منطقة/ناحية يجب ان لا يقل عن 3 حروف',
            'region.max'            => 'حقل منطقة/ناحية يجب ان لا يزيد عن 255 حروف',
            'region.regex'          => 'حقل منطقة/ناحية يجب ان يتكوت من كلمات فقط',

            'money.required'        => 'حقل المبلغ مطلوب',
            'money.integer'         => 'قيمة المبلغ يجب ان تكون قيمة رقمية',

            'description.required'          => 'حقل (وصف الحالة) مطلوب',
            'description.string'            => 'حقل (وصف الحالة) يجب ان يحتوي على نص',
            'description.min'               => 'حقل (وصف الحالة) يجب ان لا يقل عن 12 حر',
            'description.regex'             => 'حقل (وصف الحالة) يجب ان يتكون من الاحرف والمسافات فقط',

            'image.required'          => 'يجب ان تختار صورة معينة',
            'image.image'             => 'يجب ان تختار صورة معينة',
        ];
    }
}
