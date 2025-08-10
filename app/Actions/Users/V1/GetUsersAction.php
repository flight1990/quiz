<?php

namespace App\Actions\Users\V1;

use App\Actions\Action;
use App\Data\Criterias\WhereFieldCriteria;
use App\Tasks\Users\V1\GetUsersTask;
use Illuminate\Support\Collection;

class GetUsersAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetUsersTask::class)
//            ->pushCriteria(new WhereFieldCriteria('name', 'admin', '!='))
            ->run();
    }
}
