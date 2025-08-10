<?php

namespace App\Actions\Users\V1;

use App\Actions\Action;
use App\Models\User;
use App\Tasks\Users\V1\CreateUserTask;

class CreateUserAction extends Action
{
    public function run(array $payload): User
    {
        $user = app(CreateUserTask::class)->run($payload);

        if (isset($payload['roles'])) {
            $user->syncRoles($payload['roles']);
        }

        return $user;
    }
}
