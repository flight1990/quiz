<?php

namespace App\Http\Requests\V1\Questions;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => ['sometimes', 'string', 'max:6000'],
            'order' => ['sometimes', 'nullable', 'integer'],
            'is_multiple' => ['sometimes', 'nullable', 'boolean'],
            'quiz_id' => ['sometimes', 'integer', 'exists:quizzes,id'],
        ];
    }
}
