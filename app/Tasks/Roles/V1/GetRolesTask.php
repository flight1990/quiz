<?php

namespace App\Tasks\Roles\V1;

use App\Data\Repositories\RoleRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetRolesTask extends Task
{
    public function __construct(protected RoleRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
