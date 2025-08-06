<?php

namespace App\Tasks\Units\V1;

use App\Data\Repositories\UnitRepository;
use App\Models\Unit;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateUnitTask extends Task
{
    public function __construct(protected UnitRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Unit
    {
        return $this->repository->create($payload);
    }
}
