<?php

namespace App\Http\Requests\V1\Quizzes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:200'],
            'is_anonymous' => ['sometimes', 'boolean'],
            'is_active' => ['sometimes', 'boolean'],
            'questions' => ['sometimes', 'array'],
            'questions.*.id' => ['sometimes', 'integer', 'exists:questions,id'],
            'questions.*.text' => ['required', 'string', 'max:6000'],
            'questions.*.order' => ['nullable', 'integer'],
            'questions.*.is_multiple' => ['nullable', 'boolean'],
        ];
    }
}
