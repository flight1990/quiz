<?php

namespace App\SubActions\V1\Quizzes;

use App\Models\Quiz;
use App\Tasks\Quizzes\V1\CreateQuizTask;

class CreateQuizSubAction
{
    public function run(array $payload): Quiz
    {
        $quiz = app(CreateQuizTask::class)->run($payload);

        if (isset($payload['questions'])) {
            app(SyncQuizQuestionsSubAction::class)->run($quiz, $payload['questions']);
        }

        if (isset($payload['units'])) {
            $quiz->units()->sync($payload['units']);
        }

        return $quiz;
    }
}
