<?php

namespace App\Tasks\Users\V1;

use App\Data\Repositories\UserRepository;
use App\Models\User;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateUserTask extends Task
{
    public function __construct(protected UserRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): User
    {
        return $this->repository->create($payload);
    }
}
