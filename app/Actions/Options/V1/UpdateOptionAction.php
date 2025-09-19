<?php

namespace App\Actions\Options\V1;

use App\Actions\Action;
use App\Models\Option;
use App\SubActions\V1\Questions\CheckQuestionIsMultipleSubAction;
use App\Tasks\Options\V1\GetOptionsByQuestionIdTask;
use App\Tasks\Options\V1\UpdateOptionTask;
use App\Tasks\Questions\V1\FindQuestionByIdTask;
use App\Tasks\Questions\V1\UpdateQuestionTask;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateOptionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Option
    {
        $option = app(UpdateOptionTask::class)->run($payload, $id);
        app(CheckQuestionIsMultipleSubAction::class)->run($option['question_id']);

        return app(UpdateOptionTask::class)->run($payload, $id);
    }
}
