<?php

namespace App\Tasks\QuizSessions\V1;

use App\Data\Repositories\QuizSessionRepository;
use App\Models\QuizSession;
use App\Tasks\Task;

class FindQuizSessionByIdTask extends Task
{
    public function __construct(protected QuizSessionRepository $repository)
    {}

    public function run(int $id): QuizSession
    {
        return $this->repository->find($id);
    }
}
