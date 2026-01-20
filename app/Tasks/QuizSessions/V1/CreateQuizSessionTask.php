<?php

namespace App\Tasks\QuizSessions\V1;

use App\Data\Repositories\QuizSessionRepository;
use App\Models\QuizSession;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizSessionTask extends Task
{
    public function __construct(protected QuizSessionRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSession
    {
        return $this->repository->create($payload);
    }
}
