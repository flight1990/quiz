<?php

namespace App\Tasks\QuizAttempts;

use App\Data\Repositories\QuizAttemptRepository;
use App\Tasks\Task;

class DeleteQuizAttemptTask extends Task
{
    public function __construct(protected QuizAttemptRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
