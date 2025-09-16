<?php

namespace App\Actions\Statistics;

use App\Actions\Action;
use App\Tasks\Statistics\GetQuestionStatisticByQuestionIdTask;
use Illuminate\Support\Collection;

class GetQuestionStatisticByQuestionIdAction extends Action
{
    public function run(int $questionId): Collection
    {
        return app(GetQuestionStatisticByQuestionIdTask::class)->run($questionId);
    }
}
