<?php

namespace App\Tasks\Questions\V1;

use App\Data\Repositories\QuestionRepository;
use App\Tasks\Task;

class DeleteQuestionTask extends Task
{
    public function __construct(protected QuestionRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
