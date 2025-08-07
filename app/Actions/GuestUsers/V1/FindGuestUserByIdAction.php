<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Models\GuestUser;
use App\Models\User;
use App\Tasks\GuestUsers\V1\FindGuestUserByIdTask;
use App\Tasks\Users\V1\FindUserByIdTask;

class FindGuestUserByIdAction extends Action
{
    public function run(int $id): GuestUser
    {
        return app(FindGuestUserByIdTask::class)->run($id);
    }
}
