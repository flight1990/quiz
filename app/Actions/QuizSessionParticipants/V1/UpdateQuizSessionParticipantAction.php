<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Models\QuizSessionParticipant;
use App\Tasks\QuizSessionParticipants\V1\UpdateQuizSessionParticipantTask;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuizSessionParticipantAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): QuizSessionParticipant
    {
        return app(UpdateQuizSessionParticipantTask::class)->run($payload, $id);
    }
}
