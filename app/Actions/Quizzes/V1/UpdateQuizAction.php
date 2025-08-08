<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\SubActions\V1\Quizzes\UpdateQuizSubAction;

class UpdateQuizAction extends Action
{
    public function run(array $payload, int $id): Quiz
    {
        return app(UpdateQuizSubAction::class)->run($payload, $id);
    }
}
