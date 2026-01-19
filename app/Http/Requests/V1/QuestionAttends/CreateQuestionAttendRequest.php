<?php

namespace App\Http\Requests\V1\QuestionAttends;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionAttendRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_id' => ['required', 'int', 'exists:questions,id'],
            'status' => ['required', 'string', 'in:started,completed,skipped'],
        ];
    }
}
