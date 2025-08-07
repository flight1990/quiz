<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Models\GuestUser;
use App\Tasks\GuestUsers\V1\CreateGuestUserTask;
use Illuminate\Support\Str;

class CreateGuestUserAction extends Action
{
    public function run(array $payload): GuestUser
    {
        $payload['uuid'] = Str::uuid();
        return app(CreateGuestUserTask::class)->run($payload);
    }
}
