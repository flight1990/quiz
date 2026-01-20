<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Models\QuizSessionParticipant;
use App\Tasks\QuizSessionParticipants\V1\CreateQuizSessionParticipantTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizSessionParticipantAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionParticipant
    {
        return app(CreateQuizSessionParticipantTask::class)->run($payload);
    }
}
