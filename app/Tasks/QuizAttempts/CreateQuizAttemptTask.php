<?php

namespace App\Tasks\QuizAttempts;

use App\Data\Repositories\QuizAttemptRepository;
use App\Models\QuizAttempt;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizAttemptTask extends Task
{
    public function __construct(protected QuizAttemptRepository $repository)
    {
    }

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizAttempt
    {
        return $this->repository->create($payload);
    }
}
