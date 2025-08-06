<?php

namespace App\Tasks\Quizzes\V1;

use App\Data\Repositories\QuizRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuizzesTask extends Task
{
    public function __construct(protected QuizRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
