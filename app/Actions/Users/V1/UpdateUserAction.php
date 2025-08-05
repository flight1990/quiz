<?php

namespace App\Actions\Users\V1;

use App\Actions\Action;
use App\Models\User;
use App\Tasks\Users\V1\UpdateUserTask;

class UpdateUserAction extends Action
{
    public function run(array $payload, int $id): User
    {
        return app(UpdateUserTask::class)->run($payload, $id);
    }
}
