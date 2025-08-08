<?php

namespace App\Tasks\Answers\V1;

use App\Data\Repositories\AnswerRepository;
use App\Models\Answer;
use App\Tasks\Task;

class FindAnswerByIdTask extends Task
{
    public function __construct(protected AnswerRepository $repository)
    {}

    public function run(int $id): Answer
    {
        return $this->repository->find($id);
    }
}
