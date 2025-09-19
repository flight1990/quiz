<?php

namespace App\SubActions\V1\Questions;

use App\Models\Question;
use App\Tasks\Options\V1\GetOptionsByQuestionIdTask;
use App\Tasks\Questions\V1\UpdateQuestionTask;

class CheckQuestionIsMultipleSubAction
{
    public function run(int $questionId): void
    {
        $options = app(GetOptionsByQuestionIdTask::class)->run($questionId);

        $correctOptionsCont = count($options->filter(fn($o) => $o['is_correct']));
        app(UpdateQuestionTask::class)->run(['is_multiple' => $correctOptionsCont > 1], $questionId);
    }
}
