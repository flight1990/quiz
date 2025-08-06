<?php

namespace App\Tasks\Units\V1;

use App\Data\Repositories\UnitRepository;
use App\Tasks\Task;

class DeleteUnitTask extends Task
{
    public function __construct(protected UnitRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
