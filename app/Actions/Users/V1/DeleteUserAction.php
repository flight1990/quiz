<?php

namespace App\Actions\Users\V1;

use App\Actions\Action;
use App\Tasks\Users\V1\DeleteUserTask;

class DeleteUserAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteUserTask::class)->run($id);
    }
}
