<?php

namespace App\Rules;

use App\Models\Option;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
class HasCorrectOption implements ValidationRule
{
    protected ?int $questionId;

    public function __construct(?int $questionId = null)
    {
        $this->questionId = $questionId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $hasCorrectInRequest = collect($value ?? [])
            ->where('is_correct', true)
            ->isNotEmpty();

        $hasCorrectInDb = false;

        if ($this->questionId) {
            $hasCorrectInDb = Option::query()->where('question_id', $this->questionId)
                ->where('is_correct', true)
                ->exists();
        }

        if (! $hasCorrectInRequest && ! $hasCorrectInDb) {
            $fail('The question must have at least one correct option.');
        }
    }
}
