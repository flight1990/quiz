<?php

namespace App\SubActions\V1\Answers;

use App\Models\Answer;
use App\Tasks\Answers\V1\CreateAnswerTask;
use App\Tasks\Options\V1\GetCorrectOptionsByQuestionIdTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateAnswerSubAction
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Answer
    {
        $payload['guest_user_id'] = auth('guest-api')->id();
        $answer = app(CreateAnswerTask::class)->run($payload);

        $isCorrect = false;

        if (!empty($payload['options'])) {
            $answer->options()->sync($payload['options']);

            $correctOptionIds = app(GetCorrectOptionsByQuestionIdTask::class)->run($answer->question_id);
            $selectedOptionIds = $payload['options'];

            sort($correctOptionIds);
            sort($selectedOptionIds);

            $isCorrect = ($correctOptionIds === $selectedOptionIds);
        }

        elseif (!empty($payload['other'])) {
            $isCorrect = true;
        }

        $answer['is_correct'] = $isCorrect;
        $answer->save();

        return $answer;
    }
}
