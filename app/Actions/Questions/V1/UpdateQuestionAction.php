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
        $question = app(UpdateQuestionSubAction::class)->run($payload, $id);

        if (isset($payload['media_ids'])) {
            $question->media()->sync($payload['media_ids']);
        }

        return $question;
    }
}
