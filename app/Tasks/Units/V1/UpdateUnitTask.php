<?php

namespace App\Tasks\Units\V1;

use App\Data\Repositories\UnitRepository;
use App\Models\Unit;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateUnitTask extends Task
{
    public function __construct(protected UnitRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Unit
    {
        return $this->repository->update($payload, $id);
    }
}
