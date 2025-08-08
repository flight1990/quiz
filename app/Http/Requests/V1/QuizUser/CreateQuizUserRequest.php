<?php

namespace App\Http\Requests\V1\QuizUser;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quiz_id' => ['required', 'integer', 'exists:quizzes,id'],
            'guest_user_id' => ['required', 'integer', 'exists:guest_users,id'],
        ];
    }
}
