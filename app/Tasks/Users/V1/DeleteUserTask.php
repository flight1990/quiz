<?php

namespace App\Tasks\Users\V1;

use App\Data\Repositories\UserRepository;
use App\Tasks\Task;

class DeleteUserTask extends Task
{
    public function __construct(protected UserRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
