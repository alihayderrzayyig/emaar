<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class joinUsRequest extends FormRequest
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

            'email'     => 'required|email',

            'governorate'   => 'required|integer',
            'district'      => 'required|integer',
            'region'        => 'required|string',
            'description'   => 'required|string',
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

            'email.required'        => 'البريد الالكتروني مطلوب',
            'email.email'           => 'تأكد من ادخال البريد الالكتروني بشكل طحيح',

            'governorate.required'   => 'عليك اختيار محافضة.',
            'district.required'      => 'عليك اختيار قضاء معين',
            'governorate.integer'   => 'عليك اختيار محافضة.',
            'district.integer'      => 'عليك اختيار قضاء معين',



            'region.required'        => 'هذا الحقل مطلوب',
            'description.required'        => 'هذا الحقل مطلوب',
        ];
    }


    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('error', 'لم يتم ارسال الرسالة بنجاح تحقق من صحة المعلومات رجائاً');
        session()->flash('joinus-error', 't');
        return parent::failedValidation($validator);
    }


}
