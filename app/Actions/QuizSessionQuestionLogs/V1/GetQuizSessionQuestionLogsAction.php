<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Tasks\QuizSessionQuestionLogs\V1\GetQuizSessionQuestionLogsTask;
use Illuminate\Support\Collection;

class GetQuizSessionQuestionLogsAction extends Action
{
    public function run(array $params = []): Collection
    {
        return app(GetQuizSessionQuestionLogsTask::class)->run();
    }
}
