<?php

namespace App\Actions\QuizUser\V1;

use App\Actions\Action;
use App\Tasks\QuizUser\V1\DeleteQuizUserTask;

class DeleteQuizUserAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteQuizUserTask::class)->run($id);
    }
}
