<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Models\Answer;
use App\Tasks\Answers\V1\UpdateAnswerTask;

class UpdateAnswerAction extends Action
{
    public function run(array $payload, int $id): Answer
    {
        return app(UpdateAnswerTask::class)->run($payload, $id);
    }
}
