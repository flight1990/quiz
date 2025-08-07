<?php

namespace App\Tasks\Options\V1;

use App\Data\Repositories\OptionRepository;
use App\Models\Option;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateOptionTask extends Task
{
    public function __construct(protected OptionRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Option
    {
        return $this->repository->update($payload, $id);
    }
}
