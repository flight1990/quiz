<?php

namespace App\Http\Requests\V1\Answers;

use Illuminate\Foundation\Http\FormRequest;

class CreateBulkAnswersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $answerRules = [];
        $createAnswerRules = CreateAnswerRequest::getRules();

        foreach ($createAnswerRules as $key => $rule) {
            $answerRules['answers.*.' . $key] = $rule;
        }

        return array_merge([
            'answers' => ['array', 'required'],
        ], $answerRules);
    }
}
