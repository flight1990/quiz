<?php

namespace App\Tasks\Quizzes\V1;

use App\Data\Repositories\QuizRepository;
use App\Models\Quiz;
use App\Tasks\Task;

class FindQuizByIdTask extends Task
{
    public function __construct(protected QuizRepository $repository)
    {}

    public function run(int $id): Quiz
    {
        return $this->repository->find($id);
    }
}
