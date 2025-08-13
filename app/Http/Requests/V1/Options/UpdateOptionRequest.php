<?php

namespace App\Http\Requests\V1\Options;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateOptionRequest extends FormRequest
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
            'text' => ['sometimes', 'string', 'max:6000'],
            'question_id' => ['sometimes', 'integer', 'exists:questions,id'],
            'is_correct' => ['sometimes', 'nullable', 'boolean'],
        ], $except);
    }
}
