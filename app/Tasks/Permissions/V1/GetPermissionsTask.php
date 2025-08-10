<?php

namespace App\Tasks\Permissions\V1;

use App\Data\Repositories\PermissionRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetPermissionsTask extends Task
{
    public function __construct(protected PermissionRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
