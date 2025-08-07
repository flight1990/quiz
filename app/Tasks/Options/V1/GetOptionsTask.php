<?php

namespace App\Tasks\Options\V1;

use App\Data\Repositories\OptionRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetOptionsTask extends Task
{
    public function __construct(protected OptionRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
