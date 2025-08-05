<?php

namespace App\Actions\Users\V1;

use App\Actions\Action;
use App\Tasks\Users\V1\GetUsersTask;
use Illuminate\Support\Collection;

class GetUsersAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetUsersTask::class)->run();
    }
}
