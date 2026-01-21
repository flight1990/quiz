<?php

namespace App\Http\Requests\V1\QuizSessionParticipants;

use Illuminate\Foundation\Http\FormRequest;

class SetQuizSessionParticipantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'session_id' => ['required', 'int', 'exists:quiz_sessions,id'],
        ];
    }
}
