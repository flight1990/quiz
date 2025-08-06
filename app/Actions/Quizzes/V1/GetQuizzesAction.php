<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Tasks\Quizzes\V1\GetQuizzesTask;
use Illuminate\Support\Collection;

class GetQuizzesAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetQuizzesTask::class)->run();
    }
}
