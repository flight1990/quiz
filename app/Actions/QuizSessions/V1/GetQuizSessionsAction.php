<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Tasks\QuizSessions\V1\GetQuizSessionsTask;
use Illuminate\Support\Collection;

class GetQuizSessionsAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetQuizSessionsTask::class)->run();
    }
}
