<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Models\Answer;
use App\Tasks\Answers\V1\CreateAnswerTask;

class CreateAnswerAction extends Action
{
    public function run(array $payload): Answer
    {
        return app(CreateAnswerTask::class)->run($payload);
    }
}
