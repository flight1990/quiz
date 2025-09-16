<?php

namespace App\Actions\Quizzes\V1;

use App\Actions\Action;
use App\Models\Quiz;
use App\Tasks\Quizzes\V1\FindQuizBySlugTask;

class FindQuizBySlugAction extends Action
{
    public function run(string $slug): Quiz
    {
        return app(FindQuizBySlugTask::class)->run($slug);
    }
}
