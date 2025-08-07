<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Models\Question;
use App\SubActions\V1\Questions\SyncQuestionOptionsSubAction;
use App\Tasks\Questions\V1\CreateQuestionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuestionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Question
    {
        $question = app(CreateQuestionTask::class)->run($payload);

        if (isset($payload['options'])) {
            app(SyncQuestionOptionsSubAction::class)->run($question, $payload['options']);
        }

        return $question;
    }
}
