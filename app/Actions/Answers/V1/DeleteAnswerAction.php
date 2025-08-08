<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Tasks\Answers\V1\DeleteAnswerTask;

class DeleteAnswerAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteAnswerTask::class)->run($id);
    }
}
