<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Models\QuizSessionParticipant;
use App\Tasks\QuizSessionParticipants\V1\CreateQuizSessionParticipantTask;
use App\Tasks\QuizSessionParticipants\V1\FindActiveUserQuizSessionTask;
use App\Tasks\QuizSessions\V1\FindQuizSessionByIdTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class JoinQuizSessionParticipantAction extends Action
{
    /**
     * @throws ValidatorException
     * @throws ValidationException
     */
    public function run(array $payload): QuizSessionParticipant
    {
        $sessionId = $payload['session_id'];
        $guestUserId = auth('guest-api')->id();

        $session = app(FindQuizSessionByIdTask::class)->run($sessionId);

        if ($session->finished_at !== null) {
            throw ValidationException::withMessages([
                'quiz_session' => ['Quiz session already finished.'],
            ]);
        }

        if ($session->started_at === null) {
            throw ValidationException::withMessages([
                'quiz_session' => ['Quiz session has not started yet.'],
            ]);
        }

        try {
            $activeSession = app(FindActiveUserQuizSessionTask::class)->run(
                $sessionId,
                $guestUserId,
                ['joined_at'],
            );

            if ($activeSession->joined_at !== null) {
                throw ValidationException::withMessages([
                    'quiz_session' => ['User already joined.'],
                ]);
            }

            throw ValidationException::withMessages([
                'quiz_session' => ['Active session not found.'],
            ]);
        } catch (ModelNotFoundException) {}


        return app(CreateQuizSessionParticipantTask::class)->run([
            'quiz_session_id' => $sessionId,
            'guest_user_id' => $guestUserId,
            'joined_at' => now(),
        ]);
    }
}
