<?php

namespace App\Tasks\Units\V1;

use App\Data\Repositories\UnitRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetUnitsTask extends Task
{
    public function __construct(protected UnitRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
