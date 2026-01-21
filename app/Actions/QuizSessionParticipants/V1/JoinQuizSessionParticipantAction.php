<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Models\QuizSessionParticipant;
use App\Tasks\QuizSessionParticipants\V1\CreateQuizSessionParticipantTask;
use Prettus\Validator\Exceptions\ValidatorException;

class JoinQuizSessionParticipantAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionParticipant
    {
        return app(CreateQuizSessionParticipantTask::class)->run([
            'quiz_session_id' => $payload['session_id'],
            'guest_user_id' => auth('guest-api')->id(),
            'joined_at' => now(),
        ]);
    }
}
