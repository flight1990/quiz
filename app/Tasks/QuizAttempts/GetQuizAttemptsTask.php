<?php

namespace App\Tasks\QuizAttempts;

use App\Data\Repositories\QuizAttemptRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuizAttemptsTask extends Task
{
    public function __construct(protected QuizAttemptRepository $repository)
    {
    }


    public function run(): Collection
    {
        return $this->repository->get();
    }
}
