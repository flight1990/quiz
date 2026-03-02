<?php

namespace App\Http\Requests\V1\Questions;

use App\Http\Requests\V1\Options\CreateOptionRequest;
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
            'options' => ['sometimes', 'array'],
        ];

        $type = request()->input('type');

        if ($type === 'test') {
            $optionsRules['options'][] = new HasCorrectOption($questionId);
        }

        $createOptionRules = CreateOptionRequest::getRules(['question_id']);

        foreach ($createOptionRules as $key => $rule) {
            $optionsRules['options.*.' . $key] = $rule;
        }

        return Arr::except(array_merge([
            'text' => ['required', 'string', 'max:6000'],
            'description' => ['nullable', 'string', 'max:6000'],
            'order' => ['nullable', 'integer'],
            'answer_timer' => ['nullable', 'integer'],
            'quiz_id' => ['required', 'integer', 'exists:quizzes,id'],
            'is_other' => ['nullable', 'boolean'],
            'is_multiple' => [
                'boolean',
                'required_if:type,choice',
            ],
            'type' => ['required', 'string', 'in:text,test,choice'],
            'media_ids' => ['sometimes', 'array'],
            'media_ids.*' => ['integer', 'exists:media,id'],
        ], $optionsRules), $except);
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);

        if (!array_key_exists('is_multiple', $data)) {
            $data['is_multiple'] = false;
        }

        return $data;
    }
}
