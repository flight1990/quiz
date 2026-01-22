<?php

namespace App\Tasks\QuizSessionParticipants\V1;

use App\Data\Repositories\QuizSessionParticipantRepository;
use App\Tasks\Task;
use Illuminate\Support\Collection;

class GetQuizSessionParticipantsTask extends Task
{
    public function __construct(protected QuizSessionParticipantRepository $repository)
    {}

    public function run(): Collection
    {
        return $this->repository->all();
    }
}
