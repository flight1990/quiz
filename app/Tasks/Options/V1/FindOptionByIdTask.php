<?php

namespace App\Tasks\Options\V1;

use App\Data\Repositories\OptionRepository;
use App\Models\Option;
use App\Tasks\Task;

class FindOptionByIdTask extends Task
{
    public function __construct(protected OptionRepository $repository)
    {}

    public function run(int $id): Option
    {
        return $this->repository->find($id);
    }
}
