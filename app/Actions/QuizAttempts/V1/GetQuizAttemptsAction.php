<?php

namespace App\Actions\QuizAttempts\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\QuizAttempts\GetQuizAttemptsTask;
use Illuminate\Support\Collection;

class GetQuizAttemptsAction extends Action
{
    public function run(?array $params): Collection
    {
        $task = app(GetQuizAttemptsTask::class);

        if (isset($params['quiz_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('quiz_id', $params['quiz_id']));
        }

        if (isset($params['guest_user_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('guest_user_id', $params['guest_user_id']));
        }

        if (isset($params['status'])) {
            $task->pushCriteria(new WhereFieldCriteria('status', $params['status']));
        }

        return $task->run();
    }
}
