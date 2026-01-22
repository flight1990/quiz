<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Models\QuizSession;
use App\Tasks\QuizSessions\V1\FindQuizSessionByIdTask;
use App\Tasks\QuizSessions\V1\UpdateQuizSessionTask;
use DomainException;
use Illuminate\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class StartQuizSessionAction extends Action
{
    /**
     * @throws ValidatorException
     * @throws ValidationException
     */
    public function run(int $id): QuizSession
    {
        $session = app(FindQuizSessionByIdTask::class)->run($id);

        if ($session->finished_at !== null) {
            throw ValidationException::withMessages([
                'quiz_session' => ['Quiz session already finished.'],
            ]);
        }

        if ($session->started_at !== null) {
            throw ValidationException::withMessages([
                'quiz_session' => ['Quiz session already started.'],
            ]);
        }

        return app(UpdateQuizSessionTask::class)->run([
            'started_at' => now(),
        ], $id);
    }
}
