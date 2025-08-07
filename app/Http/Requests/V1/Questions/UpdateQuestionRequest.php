<?php

namespace App\Http\Requests\V1\Questions;

use App\Http\Requests\V1\Options\UpdateOptionRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return self::getRules();
    }

    public static function getRules(array $except = []): array
    {
        $optionsRules = [
            'options' => ['sometimes', 'array'],
            'options.*.id' => ['sometimes', 'integer', 'exists:options,id'],
        ];

        $updateOptionRules = UpdateOptionRequest::getRules(['question_id']);

        foreach ($updateOptionRules as $key => $rule) {
            $optionsRules['options.*.' . $key] = $rule;
        }

        return Arr::except(array_merge([
            'text' => ['sometimes', 'string', 'max:6000'],
            'order' => ['sometimes', 'nullable', 'integer'],
            'is_multiple' => ['sometimes', 'nullable', 'boolean'],
            'answer_timer' => ['sometimes', 'nullable', 'integer'],
            'quiz_id' => ['sometimes', 'integer', 'exists:quizzes,id'],
        ], $optionsRules), $except);
    }
}
