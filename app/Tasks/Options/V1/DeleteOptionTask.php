<?php

namespace App\Tasks\Options\V1;

use App\Data\Repositories\OptionRepository;
use App\Tasks\Task;

class DeleteOptionTask extends Task
{
    public function __construct(protected OptionRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
