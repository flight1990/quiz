<?php

namespace App\Tasks\QuizSessionQuestionLogs\V1;

use App\Data\Repositories\QuizSessionQuestionLogRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuizSessionQuestionLogsTask extends Task
{
    public function __construct(protected QuizSessionQuestionLogRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
