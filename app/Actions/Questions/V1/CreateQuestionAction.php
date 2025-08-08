<?php

namespace App\Actions\Questions\V1;

use App\Actions\Action;
use App\Models\Question;
use App\SubActions\V1\Questions\CreateQuestionSubAction;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateQuestionAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Question
    {
        return app(CreateQuestionSubAction::class)->run($payload);
    }
}
