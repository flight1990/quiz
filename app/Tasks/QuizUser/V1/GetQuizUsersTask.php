<?php

namespace App\Tasks\QuizUser\V1;

use App\Data\Repositories\QuizUserRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuizUsersTask extends Task
{
    public function __construct(protected QuizUserRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
