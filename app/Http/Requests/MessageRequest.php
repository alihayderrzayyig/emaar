<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'com_name'          => 'required|string|min:11|max:75|regex:/^[\p{L} ]+$/u',
            'com_phone'         => ['required' , 'regex:/^0*7(7|8|9|5)\d{8}$/', 'max:11', 'min:10'],
            'com_email'         => 'required|email|min:12|max:50',
            'com_description'   => 'required|string|min:12|regex:/^[\p{L} ]+$/u',
        ];
    }

    public function messages()
    {
        return [
            'com_name.required'     => 'الاسم مطلوب',
            'com_name.string'       => 'حقل الاسم يجب ان يكون نص فقط',
            'com_name.min'          => 'الاسم يجب ان لايقل عن 11 حرف',
            'com_name.max'          => 'الاسم يجب ان لا يزيد عن 75 حرف',
            'com_name.regex'        => 'الاسم يجب ان يتكون من الاحرف والمسافات فقط',

            'com_phone.required'          => 'حقل الهاتف مطلوب',
            'com_phone.regex'             => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'com_phone.max'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',
            'com_phone.min'               => 'تاكد من ادخال رقم هاتفك بشكل صحيح',

            'com_email.required'        => 'البريد الالكتروني مطلوب',
            'com_email.email'           => 'تأكد من ادخال البريد الالكتروني بشكل طحيح',
            'com_email.min'             => 'يجب ان لا يقل البريد الالكتروني عن 12 حرف',
            'com_email.max'             => 'يجب ان لا يزيد البريد الالكتروني عن 50 حرف',

            'com_description.required'          => 'حقل التفاصيل مطلوب',
            'com_description.string'            => 'حقل التفاصيل يجب ان يحتوي على نص',
            'com_description.min'               => 'حقل التفاصيل يجب ان لا يقل عن 12 حر',
            'com_description.regex'             => 'حقل التفاصيل يجب ان يتكون من الاحرف والمسافات فقط',

        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('error', 'لم يتم ارسال الرسالة بنجاح تحقق من صحة المعلومات رجائاً');
        session()->flash('message-error', 't');
        return parent::failedValidation($validator);
    }

}
