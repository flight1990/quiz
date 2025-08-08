<?php

namespace App\Actions\QuizUser\V1;

use App\Actions\Action;
use App\Models\QuizUser;
use App\Tasks\QuizUser\V1\CreateQuizUserTask;
use Carbon\Carbon;

class CreateQuizUserAction extends Action
{
    public function run(array $payload): QuizUser
    {
        $payload['completed_at'] = Carbon::now();
        return app(CreateQuizUserTask::class)->run($payload);
    }
}
