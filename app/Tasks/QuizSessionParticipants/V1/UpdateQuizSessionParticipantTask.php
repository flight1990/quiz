<?php

namespace App\Tasks\QuizSessionParticipants\V1;

use App\Data\Repositories\QuizSessionParticipantRepository;
use App\Models\QuizSessionParticipant;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuizSessionParticipantTask extends Task
{
    public function __construct(protected QuizSessionParticipantRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): QuizSessionParticipant
    {
        return $this->repository->update($payload, $id);
    }
}
