<?php

namespace App\Http\Requests\V1\QuizSession;

use Illuminate\Foundation\Http\FormRequest;

class StartQuizSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

        ];
    }
}
