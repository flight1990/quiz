<?php

namespace App\Tasks\Units\V1;

use App\Data\Repositories\UnitRepository;
use App\Models\Unit;
use App\Tasks\Task;

class FindUnitByIdTask extends Task
{
    public function __construct(protected UnitRepository $repository)
    {}

    public function run(int $id): Unit
    {
        return $this->repository->find($id);
    }
}
