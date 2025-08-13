<?php

namespace App\SubActions\V1\Quizzes;

use App\Models\Quiz;
use App\Tasks\Quizzes\V1\UpdateQuizTask;

class UpdateQuizSubAction
{
    public function run(array $payload, int $id): Quiz
    {
        $quiz = app(UpdateQuizTask::class)->run($payload, $id);

        if (isset($payload['questions'])) {
            app(SyncQuizQuestionsSubAction::class)->run($quiz, $payload['questions']);
        }

        if (isset($payload['units'])) {
            $quiz->units()->sync($payload['units']);
        }

        return $quiz;
    }
}
