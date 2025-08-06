<?php

namespace App\Actions\Units\V1;

use App\Actions\Action;
use App\Models\Unit;
use App\Tasks\Units\V1\FindUnitByIdTask;

class FindUnitByIdAction extends Action
{
    public function run(int $id): Unit
    {
        return app(FindUnitByIdTask::class)->run($id);
    }
}
