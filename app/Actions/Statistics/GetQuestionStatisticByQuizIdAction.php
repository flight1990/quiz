<?php

namespace App\Actions\Statistics;

use App\Actions\Action;
use App\Tasks\Statistics\GetQuestionStatisticByQuizIdTask;
use Illuminate\Support\Collection;

class GetQuestionStatisticByQuizIdAction extends Action
{
    public function run(int $quizId, array $params = []): Collection
    {
        return app(GetQuestionStatisticByQuizIdTask::class)->run($quizId, $params);
    }
}
