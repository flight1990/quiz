<?php

namespace App\Tasks\Questions\V1;

use App\Data\Repositories\QuestionRepository;
use App\Models\Question;
use App\Tasks\Task;

class FindQuestionByIdTask extends Task
{
    public function __construct(protected QuestionRepository $repository)
    {}

    public function run(int $id): Question
    {
        return $this->repository->find($id);
    }
}
