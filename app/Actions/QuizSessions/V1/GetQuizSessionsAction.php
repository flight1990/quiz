<?php

namespace App\Actions\QuizSessions\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\QuizSessions\V1\GetQuizSessionsTask;
use Illuminate\Support\Collection;

class GetQuizSessionsAction extends Action
{
    public function run(?array $params): Collection
    {
        $task = app(GetQuizSessionsTask::class);

        if (isset($params['quiz_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('quiz_id', $params['quiz_id']));
        }

        if (isset($params['user_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('user_id', $params['user_id']));
        }

        return $task->run();
    }
}
