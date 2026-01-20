<?php

namespace App\Tasks\QuizSessionParticipants\V1;

use App\Data\Repositories\QuizSessionParticipantRepository;
use App\Models\QuizSessionParticipant;
use App\Tasks\Task;

class FindQuizSessionParticipantByIdTask extends Task
{
    public function __construct(protected QuizSessionParticipantRepository $repository)
    {}

    public function run(int $id): QuizSessionParticipant
    {
        return $this->repository->find($id);
    }
}
