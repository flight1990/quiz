<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Models\QuizSession;
use App\Tasks\QuizSessions\V1\FindQuizSessionByIdTask;

class FindQuizSessionByIdAction extends Action
{
    public function run(int $id): QuizSession
    {
        return app(FindQuizSessionByIdTask::class)->run($id);
    }
}
