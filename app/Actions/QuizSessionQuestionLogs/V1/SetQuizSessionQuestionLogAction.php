<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Models\QuizSessionQuestionLog;
use App\Tasks\QuizSessionQuestionLogs\V1\CreateQuizSessionQuestionLogTask;
use App\Tasks\QuizSessions\V1\UpdateQuizSessionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class SetQuizSessionQuestionLogAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): QuizSessionQuestionLog
    {
        app(UpdateQuizSessionTask::class)->run([
            'current_question_id' => $payload['question_id']
        ],$payload['session_id']);

        return app(CreateQuizSessionQuestionLogTask::class)->run([
            'quiz_session_id' => $payload['session_id'],
            'question_id' => $payload['question_id'],
            'status' => 'started',
            'datetime' => now(),
        ]);
    }
}
