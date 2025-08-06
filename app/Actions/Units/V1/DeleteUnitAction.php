<?php

namespace App\Actions\Units\V1;

use App\Actions\Action;
use App\Tasks\Units\V1\DeleteUnitTask;

class DeleteUnitAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteUnitTask::class)->run($id);
    }
}
