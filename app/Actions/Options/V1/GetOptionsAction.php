<?php

namespace App\Actions\Options\V1;

use App\Actions\Action;
use App\Tasks\Options\V1\GetOptionsTask;
use Illuminate\Support\Collection;

class GetOptionsAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetOptionsTask::class)->run();
    }
}
