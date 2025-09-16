<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\SubActions\V1\Quizzes\CreateQuizSubAction;
use Illuminate\Support\Str;

class CreateQuizAction extends Action
{
    public function run(array $payload): Quiz
    {
        $payload['user_id'] = auth('api')->id();
        $payload['slug'] = Str::uuid();

        return app(CreateQuizSubAction::class)->run($payload);
    }
}
