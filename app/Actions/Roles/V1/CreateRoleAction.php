<?php

namespace App\Actions\Roles\V1;

use App\Actions\Action;
use App\Tasks\Roles\V1\CreateRoleTask;
use Prettus\Validator\Exceptions\ValidatorException;
use Spatie\Permission\Models\Role;

class CreateRoleAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Role
    {
        $payload['guard_name'] = 'api';

        $role = app(CreateRoleTask::class)->run($payload);

        if (isset($payload['permissions'])) {
            $role->syncPermissions($payload['permissions']);
        }

        if (isset($payload['users'])) {
            $role->syncUsers($payload['users']);
        }

        return $role;
    }
}
