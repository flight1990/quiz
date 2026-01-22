<?php

namespace App\Tasks\QuizSessions\V1;

use App\Data\Repositories\QuizSessionRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuizSessionsTask extends Task
{
    public function __construct(protected QuizSessionRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
