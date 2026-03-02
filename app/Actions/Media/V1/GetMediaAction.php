<?php

namespace App\Actions\Media\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\Media\V1\GetMediaTask;
use Illuminate\Support\Collection;

class GetMediaAction extends Action
{
    public function run(?array $params): Collection
    {
        $task = app(GetMediaTask::class);

        if (isset($params['extension'])) {
            $task->pushCriteria(new WhereFieldCriteria('extension', $params['extension']));
        }

        return $task->run();
    }
}
