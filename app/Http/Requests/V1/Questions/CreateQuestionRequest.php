<?php

namespace App\Http\Requests\V1\Questions;

use App\Http\Requests\V1\Options\CreateOptionRequest;
use App\Models\Option;
use App\Rules\HasCorrectOption;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CreateQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return self::getRules([], null);
    }

    public static function getRules(array $except = [], ?int $questionId = null): array
    {
        $optionsRules = [
            'options' => ['sometimes', 'array', new HasCorrectOption($questionId)],
        ];

        $createOptionRules = CreateOptionRequest::getRules(['question_id']);

        foreach ($createOptionRules as $key => $rule) {
            $optionsRules['options.*.' . $key] = $rule;
        }

        return Arr::except(array_merge([
            'text' => ['required', 'string', 'max:6000'],
            'description' => ['nullable', 'string', 'max:6000'],
            'order' => ['nullable', 'integer'],
            'is_multiple' => ['nullable', 'boolean'],
            'answer_timer' => ['nullable', 'integer'],
            'quiz_id' => ['required', 'integer', 'exists:quizzes,id'],
        ], $optionsRules), $except);
    }
}
