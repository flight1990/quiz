<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Answer;

class NotAnsweredYet implements ValidationRule
{
    public function __construct(
        protected int $userId
    )
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Answer::query()->where('guest_user_id', $this->userId)
            ->where('question_id', $value)
            ->exists()
        ) {
            $fail('You have already answered this question.');
        }
    }
}
