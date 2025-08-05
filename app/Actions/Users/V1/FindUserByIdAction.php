<?php

namespace App\Actions\Users\V1;

use App\Actions\Action;
use App\Models\User;
use App\Tasks\Users\V1\FindUserByIdTask;

class FindUserByIdAction extends Action
{
    public function run(int $id): User
    {
        return app(FindUserByIdTask::class)->run($id);
    }
}
