<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\Tasks\Quizzes\V1\FindQuizByIdTask;

class FindQuizByIdAction extends Action
{
    public function run(int $id): Quiz
    {
        return app(FindQuizByIdTask::class)->run($id);
    }
}
