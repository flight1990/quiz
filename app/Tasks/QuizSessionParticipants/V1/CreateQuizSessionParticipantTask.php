<?php

namespace App\Tasks\QuizSessionParticipants\V1;

use App\Data\Repositories\QuizSessionParticipantRepository;
use App\Models\QuizSessionParticipant;
use App\Tasks\Task;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizSessionParticipantTask extends Task
{
    public function __construct(protected QuizSessionParticipantRepository $repository)
    {}

    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionParticipant
    {
        return $this->repository->create($payload);
    }
}
