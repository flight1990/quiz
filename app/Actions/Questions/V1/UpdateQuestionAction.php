<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Models\Question;
use App\SubActions\V1\Questions\UpdateQuestionSubAction;
use Prettus\Validator\Exceptions\ValidatorException;

class UpdateQuestionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload, int $id): Question
    {
        return app(UpdateQuestionSubAction::class)->run($payload, $id);
    }
}
