<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Models\Answer;
use App\Tasks\Answers\V1\FindAnswerByIdTask;

class FindAnswerByIdAction extends Action
{
    public function run(int $id): Answer
    {
        return app(FindAnswerByIdTask::class)->run($id);
    }
}
