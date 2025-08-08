<?php

namespace App\Tasks\Answers\V1;

use App\Data\Repositories\AnswerRepository;
use App\Tasks\Task;

class DeleteAnswerTask extends Task
{
    public function __construct(protected AnswerRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
