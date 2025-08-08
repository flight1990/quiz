<?php

namespace App\Http\Requests\V1\Answers;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return self::getRules();
    }

    public static function getRules(): array
    {
        return [
            'question_id' => ['required', 'integer', 'exists:questions,id'],
            'guest_user_id' => ['required', 'integer', 'exists:guest_users,id'],
            'option_id' => ['required', 'integer', 'exists:options,id'],
            'other' => ['sometimes', 'nullable', 'string', 'max:6000'],
        ];
    }
}
