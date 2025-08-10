<?php

namespace App\Actions\Users\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Models\User;
use App\Tasks\Users\V1\UpdateUserTask;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateUserAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): User
    {
        $user = app(UpdateUserTask::class)
            ->pushCriteria(new WhereFieldCriteria('name', 'admin', '!='))
            ->run($payload, $id);

        if (isset($payload['roles'])) {
            $user->syncRoles($payload['roles']);
        }

        return $user;
    }
}
