<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,'.$this->route('user')->id.',id',
            'phone' => 'numeric|unique:users,phone,'.$this->route('user')->id.',id',
            'password' => 'min:8',
            'confirm_password' => 'same:password',
        ];
    }
}
