<?php

namespace App\Tasks\QuizSessionQuestionLogs\V1;

use App\Data\Repositories\QuizSessionQuestionLogRepository;
use App\Tasks\Task;

class DeleteQuizSessionQuestionLogTask extends Task
{
    public function __construct(protected QuizSessionQuestionLogRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
