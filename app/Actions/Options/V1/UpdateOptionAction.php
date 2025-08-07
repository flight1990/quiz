<?php

namespace App\Actions\Options\V1;

use App\Actions\Action;
use App\Models\Option;
use App\Tasks\Options\V1\UpdateOptionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateOptionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Option
    {
        return app(UpdateOptionTask::class)->run($payload, $id);
    }
}
