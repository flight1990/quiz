<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Tasks\Questions\V1\GetQuestionsTask;
use Illuminate\Support\Collection;

class GetQuestionsAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetQuestionsTask::class)->run();
    }
}
