<?php

namespace App\Actions\QuizSessionQuestionLogs\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\QuizSessionQuestionLogs\V1\GetQuizSessionQuestionLogsTask;
use Illuminate\Support\Collection;

class GetQuizSessionQuestionLogsAction extends Action
{
    public function run(array $params = []): Collection
    {
        $task = app(GetQuizSessionQuestionLogsTask::class);

        if (isset($params['quiz_session_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('quiz_session_id', $params['quiz_session_id']));
        }

        if (isset($params['status'])) {
            $task->pushCriteria(new WhereFieldCriteria('status', $params['status']));
        }

        return $task->run();
    }
}
