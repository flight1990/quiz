<?php

namespace App\SubActions\V1\Questions;

use App\Models\Question;
use App\Tasks\Options\V1\CreateOptionTask;
use App\Tasks\Options\V1\UpdateOptionTask;
use Illuminate\Support\Facades\DB;

class SyncQuestionOptionsSubAction
{
    public function run(Question $question, array $options): void
    {
        DB::transaction(function () use ($question, $options) {
            $existingIds = [];
            $correctCount = 0;

            foreach ($options as $data) {
                if (isset($data['id'])) {
                    $option = app(UpdateOptionTask::class)->run($data, $data['id']);
                } else {
                    $option = app(CreateOptionTask::class)->run(array_merge(['question_id' => $question['id']], $data));
                }

                if (!empty($option['is_correct'])) {
                    $correctCount++;
                }

                $existingIds[] = $option['id'];
            }

            $question->options()->whereNotIn('id', $existingIds)->delete();

            $question->update([
                'is_multiple' => $correctCount > 1
            ]);
        });
    }
}
