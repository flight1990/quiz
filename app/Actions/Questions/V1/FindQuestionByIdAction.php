<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Models\Question;
use App\Tasks\Questions\V1\FindQuestionByIdTask;

class FindQuestionByIdAction extends Action
{
    public function run(int $id): Question
    {
        return app(FindQuestionByIdTask::class)->run($id);
    }
}
