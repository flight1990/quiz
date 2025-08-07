<?php

namespace App\Http\Requests\V1\Questions;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'max:6000'],
            'order' => ['nullable', 'integer'],
            'is_multiple' => ['nullable', 'boolean'],
            'quiz_id' => ['required', 'integer', 'exists:quizzes,id'],
        ];
    }
}
