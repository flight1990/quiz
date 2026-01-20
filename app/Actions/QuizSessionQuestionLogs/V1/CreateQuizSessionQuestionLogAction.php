<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\QuizSessionQuestionLogs\V1\CreateQuizSessionQuestionLogTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuizSessionQuestionLogAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionQuestionLog
    {
        return app(CreateQuizSessionQuestionLogTask::class)->run($payload);
    }
}
