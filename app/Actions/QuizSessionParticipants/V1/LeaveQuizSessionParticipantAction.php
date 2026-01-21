<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Models\QuizSessionParticipant;
use App\Tasks\QuizSessionParticipants\V1\FindActiveUserQuizSessionTask;
use App\Tasks\QuizSessionParticipants\V1\UpdateQuizSessionParticipantTask;
use Prettus\Validator\Exceptions\ValidatorException;

class LeaveQuizSessionParticipantAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionParticipant
    {
        $activeSession = app(FindActiveUserQuizSessionTask::class)->run($payload['session_id'], auth('guest-api')->id());

        return app(UpdateQuizSessionParticipantTask::class)->run([
            'left_at' => now(),
        ], $activeSession['id']);
    }
}
