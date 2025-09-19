<?php

namespace App\Actions\Options\V1;

use App\Actions\Action;
use App\Models\Option;
use App\SubActions\V1\Questions\CheckQuestionIsMultipleSubAction;
use App\Tasks\Options\V1\CreateOptionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateOptionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Option
    {
        $option = app(CreateOptionTask::class)->run($payload);
        app(CheckQuestionIsMultipleSubAction::class)->run($payload['question_id']);

        return $option;
    }
}
