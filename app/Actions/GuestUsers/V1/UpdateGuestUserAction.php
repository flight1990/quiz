<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Models\GuestUser;
use App\Tasks\GuestUsers\V1\UpdateGuestUserTask;

class UpdateGuestUserAction extends Action
{
    public function run(array $payload, int $id): GuestUser
    {
        return app(UpdateGuestUserTask::class)->run($payload, $id);
    }
}
