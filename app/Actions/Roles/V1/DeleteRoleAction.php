<?php

namespace App\Actions\Roles\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\Roles\V1\DeleteRoleTask;

class DeleteRoleAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteRoleTask::class)
            ->pushCriteria(new WhereFieldCriteria('name', 'admin', '!='))
            ->run($id);
    }
}
