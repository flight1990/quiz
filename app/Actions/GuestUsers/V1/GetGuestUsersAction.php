<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Data\Criterias\WhereRelationCriteria;
use App\Data\Criterias\WithRelationsCriteria;
use App\Tasks\GuestUsers\V1\GetGuestUsersTask;
use Illuminate\Support\Collection;

class GetGuestUsersAction extends Action
{
    public function run(?array $params): Collection
    {
        $task = app(GetGuestUsersTask::class);

        if (isset($params['unit_id'])) {
            $task->pushCriteria(new WhereFieldCriteria('unit_id', $params['unit_id']));
        }

        if (isset($params['quiz_id'])) {
            $task->pushCriteria(
                new WhereRelationCriteria(
                    'quizUsers',
                    'quiz_id',
                    $params['quiz_id']
                )
            );
        }

        return $task->run();
    }
}
