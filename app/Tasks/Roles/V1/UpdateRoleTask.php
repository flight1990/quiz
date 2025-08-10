<?php

namespace App\Tasks\Roles\V1;

use App\Data\Repositories\RoleRepository;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;
use Spatie\Permission\Models\Role;

class UpdateRoleTask extends Task
{
    public function __construct(protected RoleRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Role
    {
        return $this->repository->update($payload, $id);
    }
}
