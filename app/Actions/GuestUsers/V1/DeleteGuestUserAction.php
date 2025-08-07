<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Tasks\GuestUsers\V1\DeleteGuestUserTask;

class DeleteGuestUserAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteGuestUserTask::class)->run($id);
    }
}
