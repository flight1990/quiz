<?php

namespace App\Http\Requests\V1\QuizSessionQuestionLogs;

use Illuminate\Foundation\Http\FormRequest;

class SetQuizSessionQuestionLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_id' => ['required', 'int', 'exists:questions,id']
        ];
    }
}
