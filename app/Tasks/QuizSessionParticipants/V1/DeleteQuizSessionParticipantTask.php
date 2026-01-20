<?php

namespace App\Tasks\QuizSessionParticipants\V1;

use App\Data\Repositories\QuizSessionParticipantRepository;
use App\Tasks\Task;

class DeleteQuizSessionParticipantTask extends Task
{
    public function __construct(protected QuizSessionParticipantRepository $repository)
    {}
    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}
