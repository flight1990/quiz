<?php

namespace App\Http\Requests\V1\Options;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CreateOptionRequest extends FormRequest
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
        return Arr::except([
            'text' => ['required', 'string', 'max:6000'],
            'question_id' => ['required', 'integer', 'exists:questions,id'],
            'is_correct' => ['required', 'boolean'],
        ], $except);
    }
}
