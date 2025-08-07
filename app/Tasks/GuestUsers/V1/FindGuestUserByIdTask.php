<?php

namespace App\Tasks\GuestUsers\V1;

use App\Data\Repositories\GuestUserRepository;
use App\Models\GuestUser;
use App\Tasks\Task;

class FindGuestUserByIdTask extends Task
{
    public function __construct(protected GuestUserRepository $repository)
    {}

    public function run(int $id): GuestUser
    {
        return $this->repository->find($id);
    }
}
