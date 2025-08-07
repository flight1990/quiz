<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\SubActions\V1\Quizzes\SyncQuizQuestionsSubAction;
use App\Tasks\Quizzes\V1\UpdateQuizTask;

class UpdateQuizAction extends Action
{
    public function run(array $payload, int $id): Quiz
    {
        $quiz = app(UpdateQuizTask::class)->run($payload, $id);

        if (isset($payload['questions'])) {
            app(SyncQuizQuestionsSubAction::class)->run($quiz, $payload['questions']);
        }

        return $quiz;
    }
}
