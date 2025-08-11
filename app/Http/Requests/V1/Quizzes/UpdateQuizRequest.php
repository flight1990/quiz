<?php

namespace App\Http\Requests\V1\Quizzes;

use App\Http\Requests\V1\Questions\CreateQuestionRequest;
use App\Http\Requests\V1\Questions\UpdateQuestionRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $questionsRules = [
            'questions' => ['sometimes', 'array'],
            'questions.*.id' => ['sometimes', 'integer', 'exists:questions,id'],
        ];

        $updateQuestionRules = UpdateQuestionRequest::getRules(['quiz_id']);

        foreach ($updateQuestionRules as $key => $rule) {
            $questionsRules['questions.*.' . $key ] = $rule;
        }

        return array_merge([
            'title' => ['sometimes', 'string', 'max:200'],
            'is_anonymous' => ['sometimes', 'boolean'],
            'is_active' => ['sometimes', 'boolean'],
            'description' => ['sometimes', 'nullable', 'string', 'max:6000'],
        ], $questionsRules);
    }
}
