<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Models\Question;
use App\Tasks\Questions\V1\UpdateQuestionTask;

class UpdateQuestionAction extends Action
{
    public function run(array $payload, int $id): Question
    {
        return app(UpdateQuestionTask::class)->run($payload, $id);
    }
}
