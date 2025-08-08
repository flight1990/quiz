<?php

namespace App\Tasks\Answers\V1;

use App\Data\Repositories\AnswerRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetAnswersTask extends Task
{
    public function __construct(protected AnswerRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
