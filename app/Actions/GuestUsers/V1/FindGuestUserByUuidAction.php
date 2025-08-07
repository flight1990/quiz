<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Models\GuestUser;
use App\Tasks\GuestUsers\V1\FindGuestUserByUuidTask;

class FindGuestUserByUuidAction extends Action
{
    public function run(string $uuid): GuestUser
    {
        return app(FindGuestUserByUuidTask::class)->run($uuid);
    }
}
