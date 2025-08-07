<?php

namespace App\Tasks\Options\V1;

use App\Data\Repositories\OptionRepository;
use App\Models\Option;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateOptionTask extends Task
{
    public function __construct(protected OptionRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Option
    {
        return $this->repository->create($payload);
    }
}
