<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Tasks\QuizSessions\V1\DeleteQuizSessionTask;

class DeleteQuizSessionAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteQuizSessionTask::class)->run($id);
    }
}
