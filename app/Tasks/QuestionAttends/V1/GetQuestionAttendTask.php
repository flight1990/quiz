<?php

namespace App\Tasks\QuestionAttends\V1;

use App\Data\Repositories\QuestionAttendRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuestionAttendTask extends Task
{
    public function __construct(protected QuestionAttendRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
