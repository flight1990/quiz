<?php

namespace App\Actions\Roles\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\Roles\V1\FindRoleByIdTask;
use Spatie\Permission\Models\Role;

class FindRoleByIdAction extends Action
{
    public function run(int $id): Role
    {
        return app(FindRoleByIdTask::class)
            ->pushCriteria(new WhereFieldCriteria('name', 'admin', '!='))
            ->run($id);
    }
}
