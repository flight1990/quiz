<?php

namespace App\Tasks\Users\V1;

use App\Data\Repositories\UserRepository;
use App\Models\User;
use App\Tasks\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FindUserByIdTask extends Task
{
    public function __construct(protected UserRepository $repository)
    {}

    public function run(int $id): User
    {
        return $this->repository->find($id);
    }
}
