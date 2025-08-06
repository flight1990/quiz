<?php

namespace App\Tasks\Users\V1;

use App\Data\Repositories\UserRepository;
use App\Models\User;
use App\Tasks\Task;

class FindUserByIdTask extends Task
{
    public function __construct(protected UserRepository $repository)
    {}

    public function run(int $id): User
    {
        return $this->repository->find($id);
    }
}
