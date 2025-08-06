<?php

namespace App\Actions\Units\V1;

use App\Actions\Action;
use App\Models\Unit;
use App\Tasks\Units\V1\CreateUnitTask;

class CreateUnitAction extends Action
{
    public function run(array $payload): Unit
    {
        return app(CreateUnitTask::class)->run($payload);
    }
}
