<?php

namespace App\Tasks\Roles\V1;

use App\Data\Repositories\RoleRepository;
use App\Tasks\Task;
use Spatie\Permission\Models\Role;

class FindRoleByIdTask extends Task
{
    public function __construct(protected RoleRepository $repository)
    {}

    public function run(int $id): Role
    {
        return $this->repository->find($id);
    }
}
