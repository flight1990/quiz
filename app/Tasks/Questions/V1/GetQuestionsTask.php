<?php

namespace App\Tasks\Questions\V1;

use App\Data\Repositories\QuestionRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuestionsTask extends Task
{
    public function __construct(protected QuestionRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
