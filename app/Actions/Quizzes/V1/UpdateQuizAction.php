<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\Tasks\Quizzes\V1\UpdateQuizTask;

class UpdateQuizAction extends Action
{
    public function run(array $payload, int $id): Quiz
    {
        return app(UpdateQuizTask::class)->run($payload, $id);
    }
}
