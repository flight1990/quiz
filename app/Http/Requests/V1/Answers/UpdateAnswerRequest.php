<?php

namespace App\Http\Requests\V1\Answers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_id' => ['sometimes', 'integer', 'exists:questions,id'],
            'guest_user_id' => ['sometimes', 'integer', 'exists:guest_users,id'],
            'option_id' => ['sometimes', 'integer', 'exists:options,id'],
            'other' => ['sometimes', 'nullable', 'string', 'max:6000'],
        ];
    }
}
