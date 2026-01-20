<?php

namespace App\Tasks\QuizSessionQuestionLogs\V1;

use App\Data\Repositories\QuizSessionQuestionLogRepository;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\Task;

class FindQuizSessionQuestionLogByIdTask extends Task
{
    public function __construct(protected QuizSessionQuestionLogRepository $repository)
    {}

    public function run(int $id): QuizSessionQuestionLog
    {
        return $this->repository->find($id);
    }
}
