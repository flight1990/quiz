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
        $question = app(CreateQuestionSubAction::class)->run($payload);

        if (isset($payload['media_ids'])) {
            $question->media()->sync($payload['media_ids']);
        }

        return $question;
    }
}
