<?php

namespace App\Actions\Statistics;

use App\Actions\Action;
use App\Tasks\Statistics\GetQuizStatisticByQuizIdTask;
use Illuminate\Support\Collection;

class GetQuizStatisticByQuizIdAction extends Action
{
    public function run(int $quizId): Collection
    {
        return app(GetQuizStatisticByQuizIdTask::class)->run($quizId);
    }
}
