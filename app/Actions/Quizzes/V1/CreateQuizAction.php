<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\SubActions\V1\Quizzes\SyncQuizQuestionsSubAction;
use App\Tasks\Quizzes\V1\CreateQuizTask;

class CreateQuizAction extends Action
{
    public function run(array $payload): Quiz
    {
        $quiz = app(CreateQuizTask::class)->run($payload);

        if (isset($payload['questions'])) {
            app(SyncQuizQuestionsSubAction::class)->run($quiz, $payload['questions']);
        }

        return $quiz;
    }
}
