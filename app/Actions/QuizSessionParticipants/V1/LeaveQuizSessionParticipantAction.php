<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Models\QuizSessionParticipant;
use App\Tasks\QuizSessionParticipants\V1\FindActiveUserQuizSessionTask;
use App\Tasks\QuizSessionParticipants\V1\UpdateQuizSessionParticipantTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class LeaveQuizSessionParticipantAction extends Action
{
    /**
     * @throws ValidatorException
     * @throws ValidationException
     */
    public function run(array $payload): QuizSessionParticipant
    {
        $sessionId = $payload['session_id'];
        $guestUserId = auth('guest-api')->id();

        try {
            $activeSession = app(FindActiveUserQuizSessionTask::class)->run($sessionId, $guestUserId, ['id']);
        } catch (ModelNotFoundException) {
            throw ValidationException::withMessages([
                'quiz_session' => ['Active session not found.'],
            ]);
        }

        return app(UpdateQuizSessionParticipantTask::class)->run([
            'left_at' => now(),
        ], $activeSession['id']);
    }
}
