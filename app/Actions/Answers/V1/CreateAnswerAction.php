<?php

namespace App\Actions\Answers\V1;

use App\Actions\Action;
use App\Models\Answer;
use App\SubActions\V1\Answers\CreateAnswerSubAction;
use Prettus\Validator\Exceptions\ValidatorException;

class CreateAnswerAction extends Action
{
    /**
     * @throws ValidatorException
     */
    public function run(array $payload): Answer
    {
        return app(CreateAnswerSubAction::class)->run($payload);
    }
}
