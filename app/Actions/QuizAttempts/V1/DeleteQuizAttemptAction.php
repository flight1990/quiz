<?php

namespace App\Actions\QuizAttempts\V1;

use App\Actions\Action;
use App\Tasks\QuizAttempts\DeleteQuizAttemptTask;

class DeleteQuizAttemptAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteQuizAttemptTask::class)->run($id);
    }
}
