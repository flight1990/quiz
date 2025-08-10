<?php

namespace App\Actions\Permissions;

use App\Actions\Action;
use App\Tasks\Permissions\V1\GetPermissionsTask;
use Illuminate\Support\Collection;

class GetPermissionsAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetPermissionsTask::class)->run();
    }
}
