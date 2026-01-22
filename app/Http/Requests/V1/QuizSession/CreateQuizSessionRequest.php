<?php

namespace App\Http\Requests\V1\QuizSession;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quiz_id' => ['required', 'int', 'exists:quizzes,id']
        ];
    }
}
