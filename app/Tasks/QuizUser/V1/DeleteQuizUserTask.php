<?php

namespace App\Tasks\QuizUser\V1;

use App\Data\Repositories\QuizUserRepository;
use App\Tasks\Task;

class DeleteQuizUserTask extends Task
{
    public function __construct(protected QuizUserRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
