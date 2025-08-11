<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\SubActions\V1\Quizzes\CreateQuizSubAction;

class CreateQuizAction extends Action
{
    public function run(array $payload): Quiz
    {
        $payload['user_id'] = auth('api')->id();
        return app(CreateQuizSubAction::class)->run($payload);
    }
}
