<?php

namespace App\Actions\Media\V1;

use App\Actions\Action;
use App\Tasks\Media\V1\GetMediaTask;
use Illuminate\Support\Collection;

class GetMediaAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetMediaTask::class)->run();
    }
}
