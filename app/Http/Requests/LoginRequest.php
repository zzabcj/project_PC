<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng điền vào trường này',
            'email' => 'Vui lòng nhập vào email hợp lệ',
            'min' => 'Vui lòng nhập tối thiểu 8 ký tự',
        ];
    }
}
