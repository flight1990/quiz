<?php

namespace App\Http\Requests\V1\Quizzes;

use App\Http\Requests\V1\Questions\CreateQuestionRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $questionsRules = [
            'questions' => ['sometimes', 'array'],
        ];

        $createQuestionRules = CreateQuestionRequest::getRules(['quiz_id']);

        foreach ($createQuestionRules as $key => $rule) {
            $questionsRules['questions.*.' . $key] = $rule;
        }

        return array_merge([
            'title' => ['required', 'string', 'max:200'],
            'is_anonymous' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ], $questionsRules);
    }
}
