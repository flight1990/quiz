<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\Tasks\Quizzes\V1\CreateQuizTask;

class CreateQuizAction extends Action
{
    public function run(array $payload): Quiz
    {
        return app(CreateQuizTask::class)->run($payload);
    }
}
