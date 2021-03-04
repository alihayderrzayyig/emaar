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
            'name'          => 'required|string|min:11|max:75|regex:/^[\p{L} ]+$/u',
            'phone'         => ['required' , 'regex:/^0*7(7|8|9|5)\d{8}$/', 'max:11', 'min:10'],
            'email'         => 'required|email|min:12|max:50',
            'description'   => 'required|string|min:12|regex:/^[\p{L} ]+$/u',
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

            'description.required'          => 'حقل التفاصيل مطلوب',
            'description.string'            => 'حقل التفاصيل يجب ان يحتوي على نص',
            'description.min'               => 'حقل التفاصيل يجب ان لا يقل عن 12 حر',
            'description.regex'             => 'حقل التفاصيل يجب ان يتكون من الاحرف والمسافات فقط',

        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('error', 'لم يتم ارسال الرسالة بنجاح تحقق من صحة المعلومات رجائاً');
        session()->flash('message-error', 't');
        return parent::failedValidation($validator);
    }

}
