<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SituationRequest extends FormRequest
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
            'name'          => 'required|string',
            'phone'         => ['required' , 'regex:/^0*7(7|8|9|5)\d{8}$/', 'max:11', 'min:10'],
            'governorate'   => 'required|integer',
            'district'      => 'required|integer',
            'region'        => 'required|string',
            'money'         => 'required|integer',
            'description'   => 'required|string',
            'image'         => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'الاسم مطلوب',

            'phone.required'          => 'حقل الهاتف مطلوب',
            'phone.regex'             => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'phone.max'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'phone.min'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',

            'governorate.required'          => 'عليك اختيار محافضة.',
            'governorate.integer'           => 'عليك اختيار محافضة.',
            'district.required'             => 'عليك اختيار قضاء معين',
            'district.integer'              => 'عليك اختيار قضاء معين',
            'region.required'               => 'عليك اختيار منطقة/ناحية',

            'money.required'        => 'حقل المبلغ مطلوب',
            'money.integer'         => 'قيمة المبلغ يجب ان تكون قيمة رقمية',

            'description.required'          => 'يرجا ادخال وصف للحالة الانسانية',

            'image.required'          => 'يجب ان تختار صورة معينة',
            'image.image'             => 'يجب ان تختار صورة معينة',
        ];
    }
}
