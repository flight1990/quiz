<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\Answers\V1\GetAnswersTask;
use Illuminate\Support\Collection;

class GetAnswersAction extends Action
{
    public function run(?array $params): Collection
    {
        $task = app(GetAnswersTask::class);

        if (isset($params['guest_user_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('guest_user_id', $params['guest_user_id']));
        }

        if (isset($params['quiz_session_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('quiz_session_id', $params['quiz_session_id']));
        }

        return $task->run();
    }
}
