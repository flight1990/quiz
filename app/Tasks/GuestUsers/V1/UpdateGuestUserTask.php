<?php

namespace App\Tasks\GuestUsers\V1;

use App\Data\Repositories\GuestUserRepository;
use App\Models\GuestUser;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateGuestUserTask extends Task
{
    public function __construct(protected GuestUserRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): GuestUser
    {
        return $this->repository->update($payload, $id);
    }
}
