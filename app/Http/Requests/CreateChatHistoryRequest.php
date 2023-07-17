<?php

namespace App\Http\Requests;

use App\Exceptions\ExceptionHandler;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateChatHistoryRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'message' => 'required',
            'response' => '',
            'user_id' => 'required|exists:users,id',
            'character_id' => 'required|exists:characters,id',
            'message_at' => 'required|date_format:Y-m-d H:i:s',
            'response_at' => 'date_format:Y-m-d H:i:s',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new ExceptionHandler($validator->errors()->first(), 422);
    }
}
