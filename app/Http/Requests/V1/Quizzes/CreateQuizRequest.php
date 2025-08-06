<?php

namespace App\Http\Requests\V1\Quizzes;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:200'],
            'is_anonymous' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean']
        ];
    }
}
