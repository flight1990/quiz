<?php

namespace App\SubActions\V1\Answers;

use App\Models\Answer;
use App\Tasks\Answers\V1\CreateAnswerTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateAnswerSubAction
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Answer
    {
        $answer = app(CreateAnswerTask::class)->run($payload);

        if (!empty($payload['options'])) {
            $answer->options()->sync($payload['options']);
        }

        return $answer;
    }
}
