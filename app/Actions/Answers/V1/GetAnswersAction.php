<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Tasks\Answers\V1\GetAnswersTask;
use Illuminate\Support\Collection;

class GetAnswersAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetAnswersTask::class)->run();
    }
}
