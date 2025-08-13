<?php

namespace App\Http\Requests\V1\Units;

use Illuminate\Foundation\Http\FormRequest;

class CreateUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200', 'unique:units,name'],
            'quizzes' => ['sometimes', 'array'],
            'quizzes.*' => ['integer', 'exists:quizzes,id'],
        ];
    }
}
