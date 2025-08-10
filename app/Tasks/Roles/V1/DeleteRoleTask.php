<?php

namespace App\Tasks\Roles\V1;

use App\Data\Repositories\RoleRepository;
use App\Tasks\Task;

class DeleteRoleTask extends Task
{
    public function __construct(protected RoleRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
