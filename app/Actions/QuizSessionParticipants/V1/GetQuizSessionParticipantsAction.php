<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\QuizSessionParticipants\V1\GetQuizSessionParticipantsTask;
use Illuminate\Support\Collection;

class GetQuizSessionParticipantsAction extends Action
{
    public function run(array $params = []): Collection
    {
        $task = app(GetQuizSessionParticipantsTask::class);

        if (isset($params['quiz_session_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('quiz_session_id', $params['quiz_session_id']));
        }

        if (isset($params['guest_user_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('guest_user_id', $params['guest_user_id']));
        }

        return $task->run();
    }
}
