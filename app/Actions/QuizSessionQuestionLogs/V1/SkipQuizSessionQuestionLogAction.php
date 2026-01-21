<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\QuizSessionQuestionLogs\V1\CreateQuizSessionQuestionLogTask;
use Prettus\Validator\Exceptions\ValidatorException;

class SkipQuizSessionQuestionLogAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionQuestionLog
    {
        return app(CreateQuizSessionQuestionLogTask::class)->run([
            'quiz_session_id' => $payload['session_id'],
            'question_id' => $payload['question_id'],
            'status' => 'skipped',
            'datetime' => now(),
        ]);
    }
}
