<?php

namespace App\Actions\Roles\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\Roles\V1\GetRolesTask;
use Illuminate\Support\Collection;

class GetRolesAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetRolesTask::class)
            ->pushCriteria(new WhereFieldCriteria('name', 'admin', '!='))
            ->run();
    }
}
