<?php

namespace App\Tasks\Quizzes\V1;

use App\Data\Repositories\QuizRepository;
use App\Tasks\Task;

class DeleteQuizTask extends Task
{
    public function __construct(protected QuizRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
