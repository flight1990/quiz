<?php

namespace App\Actions\Units\V1;

use App\Actions\Action;
use App\Tasks\Units\V1\GetUnitsTask;
use Illuminate\Support\Collection;

class GetUnitsAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetUnitsTask::class)->run();
    }
}
