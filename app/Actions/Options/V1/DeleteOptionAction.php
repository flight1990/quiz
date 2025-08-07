<?php

namespace App\Actions\Options\V1;

use App\Actions\Action;
use App\Tasks\Options\V1\DeleteOptionTask;

class DeleteOptionAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteOptionTask::class)->run($id);
    }
}
