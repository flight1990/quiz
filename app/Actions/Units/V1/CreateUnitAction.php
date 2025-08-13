<?php

namespace App\Actions\Units\V1;

use App\Actions\Action;
use App\Models\Unit;
use App\Tasks\Units\V1\CreateUnitTask;

class CreateUnitAction extends Action
{
    public function run(array $payload): Unit
    {
        $unit = app(CreateUnitTask::class)->run($payload);

        if (isset($payload['quizzes'])) {
            $unit->quizzes()->sync($payload['quizzes']);
        }

        return $unit;
    }
}
