<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Models\Question;
use App\Tasks\Questions\V1\CreateQuestionTask;

class CreateQuestionAction extends Action
{
    public function run(array $payload): Question
    {
        return app(CreateQuestionTask::class)->run($payload);
    }
}
