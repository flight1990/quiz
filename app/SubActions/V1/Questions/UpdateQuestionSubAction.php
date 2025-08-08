<?php

namespace App\SubActions\V1\Questions;

use App\Models\Question;
use App\Tasks\Questions\V1\UpdateQuestionTask;

class UpdateQuestionSubAction
{
    public function run(array $payload, int $id): Question
    {
        $question = app(UpdateQuestionTask::class)->run($payload, $id);

        if (isset($payload['options'])) {
            app(SyncQuestionOptionsSubAction::class)->run($question, $payload['options']);
        }

        return $question;
    }
}
