<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Models\Question;
use App\SubActions\V1\Questions\SyncQuestionOptionsSubAction;
use App\Tasks\Questions\V1\UpdateQuestionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuestionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Question
    {
        $question = app(UpdateQuestionTask::class)->run($payload, $id);

        if (isset($payload['options'])) {
            app(SyncQuestionOptionsSubAction::class)->run($question, $payload['options']);
        }

        return $question;
    }
}
