<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Tasks\Questions\V1\DeleteQuestionTask;

class DeleteQuestionAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteQuestionTask::class)->run($id);
    }
}
