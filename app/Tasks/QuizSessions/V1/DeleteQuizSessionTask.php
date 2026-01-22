<?php

namespace App\Tasks\QuizSessions\V1;

use App\Data\Repositories\QuizSessionRepository;
use App\Tasks\Task;

class DeleteQuizSessionTask extends Task
{
    public function __construct(protected QuizSessionRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
