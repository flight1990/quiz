<?php

namespace App\Actions\Roles\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\Roles\V1\UpdateRoleTask;
use Prettus\Validator\Exceptions\ValidatorException;
use Spatie\Permission\Models\Role;

class UpdateRoleAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Role
    {
        $role = app(UpdateRoleTask::class)
            ->pushCriteria(new WhereFieldCriteria('name', 'admin', '!='))
            ->run($payload, $id);

        if (isset($payload['permissions'])) {
            $role->syncPermissions($payload['permissions']);
        }

        return $role;
    }
}
