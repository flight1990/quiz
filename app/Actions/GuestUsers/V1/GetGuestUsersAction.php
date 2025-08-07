<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Tasks\GuestUsers\V1\GetGuestUsersTask;
use Illuminate\Support\Collection;

class GetGuestUsersAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetGuestUsersTask::class)->run();
    }
}
