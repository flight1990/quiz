<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Models\QuizSession;
use App\Tasks\QuizSessions\V1\UpdateQuizSessionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuizSessionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): QuizSession
    {
        return app(UpdateQuizSessionTask::class)->run($payload, $id);
    }
}
