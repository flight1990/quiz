<?php

namespace App\SubActions\V1\Questions;

use App\Models\Question;
use App\Tasks\Questions\V1\CreateQuestionTask;

class CreateQuestionSubAction
{
    public function run(array $payload): Question
    {
        $question = app(CreateQuestionTask::class)->run($payload);

        if (isset($payload['options'])) {
            app(SyncQuestionOptionsSubAction::class)->run($question, $payload['options']);
        }

        return $question;
    }
}
