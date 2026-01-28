<?php

namespace App\Http\Requests\V1\Answers;

use App\Rules\NotAnsweredYet;
use Illuminate\Foundation\Http\FormRequest;

class CreateAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = auth('guest-api')->id();

        if ($this->has('answers') && is_array($this->input('answers'))) {
            return [
                'answers' => ['required', 'array', 'min:1'],
                'answers.*.quiz_session_id' => [
                    'nullable',
                    'integer',
                    'exists:quiz_sessions,id',
                ],
                'answers.*.question_id' => [
                    'required',
                    'integer',
                    'exists:questions,id',
                    new NotAnsweredYet($userId)
                ],
                'answers.*.options' => ['required_without:answers.*.other', 'array'],
                'answers.*.options.*' => ['integer', 'exists:options,id'],
                'answers.*.other' => ['required_without:answers.*.options', 'nullable', 'string', 'max:6000'],
            ];
        }

        return [
            'quiz_session_id' => [
                'nullable',
                'integer',
                'exists:quiz_sessions,id'
            ],
            'question_id' => [
                'required',
                'integer',
                'exists:questions,id',
                new NotAnsweredYet($userId)
            ],
            'options' => ['required_without:other', 'array'],
            'options.*' => ['integer', 'exists:options,id'],
            'other' => ['required_without:options', 'nullable', 'string', 'max:6000'],
        ];
    }
}
