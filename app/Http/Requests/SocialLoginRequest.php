<?php

namespace App\Http\Requests;

use App\Exceptions\ExceptionHandler;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SocialLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'login_with' => ['required', 'in:google,apple', 'unique:users,email'],
            'access_provider_token' => ['required', 'string'],
        ];
    }

    public function message()
    {
        return [
            'login_with.in' => 'Login with type can be either google or apple',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new ExceptionHandler($validator->errors()->first(), 422);
    }
}
