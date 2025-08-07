<?php

namespace App\Actions\Options\V1;

use App\Actions\Action;
use App\Models\Option;
use App\Tasks\Options\V1\FindOptionByIdTask;

class FindOptionByIdAction extends Action
{
    public function run(int $id): Option
    {
        return app(FindOptionByIdTask::class)->run($id);
    }
}
