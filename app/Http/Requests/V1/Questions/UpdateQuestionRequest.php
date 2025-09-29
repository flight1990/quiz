<?php

namespace App\Http\Requests\V1\Questions;

use App\Http\Requests\V1\Options\UpdateOptionRequest;
use App\Rules\HasCorrectOption;
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
        $questionId = $this->route('id');
        return self::getRules([], $questionId);
    }

    public static function getRules(array $except = [], ?int $questionId = null): array
    {
        $optionsRules = [
            'options' => ['sometimes', 'array', new HasCorrectOption($questionId)],
            'options.*.id' => ['sometimes', 'integer', 'exists:options,id'],
        ];

        $updateOptionRules = UpdateOptionRequest::getRules(['question_id']);

        foreach ($updateOptionRules as $key => $rule) {
            $optionsRules['options.*.' . $key] = $rule;
        }

        return Arr::except(array_merge([
            'text' => ['sometimes', 'string', 'max:6000'],
            'description' => ['sometimes', 'nullable', 'string', 'max:6000'],
            'order' => ['sometimes', 'nullable', 'integer'],
            'answer_timer' => ['sometimes', 'nullable', 'integer'],
            'quiz_id' => ['sometimes', 'integer', 'exists:quizzes,id'],
            'is_other' => ['nullable', 'boolean'],
            'type' => ['sometimes', 'string', 'in:text,test,choice']
        ], $optionsRules), $except);
    }
}
