<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Models\Quiz;
use App\Tasks\Quizzes\V1\FindQuizByIdTask;

class FindQuizByIdAction extends Action
{
    public function run(int $id, $params = []): Quiz
    {
        $task = app(FindQuizByIdTask::class);

        if (isset($params['is_active'])) {
            $task->pushCriteria(new WhereFieldCriteria('is_active', $params['is_active']));
        }

        if (!empty($params['is_anonymous'])) {
            $task->pushCriteria(new WhereFieldCriteria('is_anonymous', $params['is_anonymous']));
        }

        return $task->run($id);
    }
}
