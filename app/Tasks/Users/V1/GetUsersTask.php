<?php

namespace App\Tasks\Users\V1;

use App\Data\Repositories\UserRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetUsersTask extends Task
{
    public function __construct(protected UserRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
