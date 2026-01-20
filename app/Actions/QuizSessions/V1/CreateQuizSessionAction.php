<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Models\QuizSession;
use App\Tasks\QuizSessions\V1\CreateQuizSessionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizSessionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSession
    {
        return app(CreateQuizSessionTask::class)->run($payload);
    }
}
