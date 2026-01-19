<?php

namespace App\Actions\QuestionAttends\V1;

use App\Actions\Action;
use App\Tasks\QuestionAttends\V1\GetQuestionAttendTask;
use Illuminate\Support\Collection;

class GetQuestionAttendAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetQuestionAttendTask::class)->run();
    }
}
