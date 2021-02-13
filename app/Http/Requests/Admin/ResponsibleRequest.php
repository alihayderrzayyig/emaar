<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ResponsibleRequest extends FormRequest
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
            'name' => 'required',
            'body' => 'required|string',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'الاسم مطلوب',
            'body.required'     => 'الوصف مطلوب',
            'body.string'       => 'الوصف مطلوب',
            'image.required'    => 'يجب ان تختار صورة',
            'image.image'       => 'يجب ان تختار صورة',
        ];
    }
}
