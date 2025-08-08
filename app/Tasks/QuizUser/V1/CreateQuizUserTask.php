<?php

namespace App\Tasks\QuizUser\V1;

use App\Data\Repositories\QuizUserRepository;
use App\Models\QuizUser;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizUserTask extends Task
{
    public function __construct(protected QuizUserRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizUser
    {
        return $this->repository->create($payload);
    }
}
