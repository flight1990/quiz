<?php

namespace App\Tasks\GuestUsers\V1;

use App\Data\Repositories\GuestUserRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetGuestUsersTask extends Task
{
    public function __construct(protected GuestUserRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
