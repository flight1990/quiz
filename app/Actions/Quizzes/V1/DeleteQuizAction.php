<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Tasks\Quizzes\V1\DeleteQuizTask;

class DeleteQuizAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteQuizTask::class)->run($id);
    }
}
