<?php

namespace App\Tasks\QuizAttempts;

use App\Data\Repositories\QuizAttemptRepository;
use App\Models\QuizAttempt;
use App\Tasks\Task;

class GetQuizAttemptsTask extends Task
{
    public function __construct(protected QuizAttemptRepository $repository)
    {
    }


    public function run(): QuizAttempt
    {
        return $this->repository->get();
    }
}
