<?php

namespace App\Tasks\GuestUsers\V1;

use App\Data\Repositories\GuestUserRepository;
use App\Tasks\Task;

class DeleteGuestUserTask extends Task
{
    public function __construct(protected GuestUserRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
