<?php

namespace App\Actions\QuizUser\V1;

use App\Actions\Action;
use App\Tasks\QuizUser\V1\GetQuizUsersTask;
use Illuminate\Support\Collection;

class GetQuizUsersAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetQuizUsersTask::class)->run();
    }
}
