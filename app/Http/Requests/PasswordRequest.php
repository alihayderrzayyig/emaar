<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8', 'max:22'],
            'new_confirm_password' => ['required','same:new_password'],
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'يرجا ادخال كلمة السر الحالية',
            'new_password.required' => 'يرجا اختيار كلمة السر الجديدة',
            'new_password.min' => 'يجب الاتقل كلمة السر الجديدة عن 8 رموز',
            'new_password.max' => 'يجب الاتزيد كلمة السر الجديدة عن 22 رموز',
            'new_confirm_password.required' => 'يرجا اعادة كتابة كلمة السر',
            'new_confirm_password.same' => 'كلمة السر الجديدة غير متطابقة',
        ];
    }


    public function withValidator($validator)
    {
        return response()->json(['errors' => $validator->errors()]);
    }
}
