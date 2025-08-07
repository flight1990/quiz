<?php

namespace App\SubActions\V1\Quizzes;

use App\Models\Quiz;
use App\Tasks\Questions\V1\CreateQuestionTask;
use App\Tasks\Questions\V1\UpdateQuestionTask;
use Illuminate\Support\Facades\DB;

class SyncQuizQuestionsSubAction
{
    public function run(Quiz $quiz, array $questions): void
    {
        DB::transaction(function () use ($quiz, $questions) {
            $existingIds = [];

            foreach ($questions as $data) {
                if (isset($data['id'])) {
                    $question = app(UpdateQuestionTask::class)->run($data, $data['id']);
                } else {
                    $question = app(CreateQuestionTask::class)->run(array_merge(['quiz_id' => $quiz['id']], $data));
                }

                $existingIds[] = $question['id'];
            }

            $quiz->questions()->whereNotIn('id', $existingIds)->delete();
        });
    }
}
