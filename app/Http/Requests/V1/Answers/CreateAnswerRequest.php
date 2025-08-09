<?php

namespace App\Http\Requests\V1\Answers;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->has('answers') && is_array($this->input('answers'))) {
            return [
                'answers' => ['required', 'array', 'min:1'],
                'answers.*.question_id' => ['required', 'integer', 'exists:questions,id'],
                'answers.*.guest_user_id' => ['required', 'integer', 'exists:guest_users,id'],
                'answers.*.options' => ['required_without:answers.*.other', 'array'],
                'answers.*.options.*' => ['integer', 'exists:options,id'],
                'answers.*.other' => ['required_without:answers.*.options', 'nullable', 'string', 'max:6000'],
            ];
        }

        return [
            'question_id' => ['required', 'integer', 'exists:questions,id'],
            'guest_user_id' => ['required', 'integer', 'exists:guest_users,id'],
            'options' => ['required_without:other', 'array'],
            'options.*' => ['integer', 'exists:options,id'],
            'other' => ['required_without:options', 'nullable', 'string', 'max:6000'],
        ];
    }
}
