<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\QuizSessionQuestionLogs\V1\UpdateQuizSessionQuestionLogTask;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuizSessionQuestionLogAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): QuizSessionQuestionLog
    {
        return app(UpdateQuizSessionQuestionLogTask::class)->run($payload, $id);
    }
}
