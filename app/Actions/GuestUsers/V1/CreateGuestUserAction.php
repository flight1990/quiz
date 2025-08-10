<?php

namespace App\Actions\GuestUsers\V1;

use App\Actions\Action;
use App\Tasks\GuestUsers\V1\CreateGuestUserTask;
use Illuminate\Support\Str;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateGuestUserAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): array
    {
        $payload['uuid'] = Str::uuid();
        return app(CreateGuestUserTask::class)->run($payload);
    }
}
