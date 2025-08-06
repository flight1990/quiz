<?php

namespace App\Actions\Units\V1;

use App\Actions\Action;
use App\Models\Unit;
use App\Tasks\Units\V1\UpdateUnitTask;

class UpdateUnitAction extends Action
{
    public function run(array $payload, int $id): Unit
    {
        return app(UpdateUnitTask::class)->run($payload, $id);
    }
}
