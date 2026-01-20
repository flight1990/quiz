<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Models\QuizSession;
use App\Tasks\QuizSessions\V1\CreateQuizSessionTask;
use App\Tasks\QuizSessions\V1\UpdateQuizSessionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class FinishQuizSessionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(int $id): QuizSession
    {
        return app(UpdateQuizSessionTask::class)->run([
            'finished_at' => now(),
            'current_question_id' => null,
        ], $id);
    }
}
