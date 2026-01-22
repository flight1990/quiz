<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\QuizSessionQuestionLogs\V1\FindQuizSessionQuestionLogByIdTask;

class FindQuizSessionQuestionLogByIdAction extends Action
{
    public function run(int $id): QuizSessionQuestionLog
    {
        return app(FindQuizSessionQuestionLogByIdTask::class)->run($id);
    }
}
