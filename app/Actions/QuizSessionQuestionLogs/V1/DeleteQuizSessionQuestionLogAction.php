<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Tasks\QuizSessionQuestionLogs\V1\DeleteQuizSessionQuestionLogTask;

class DeleteQuizSessionQuestionLogAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteQuizSessionQuestionLogTask::class)->run($id);
    }
}
