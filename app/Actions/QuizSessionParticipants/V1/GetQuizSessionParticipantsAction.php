<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Tasks\QuizSessionParticipants\V1\GetQuizSessionParticipantsTask;
use Illuminate\Support\Collection;

class GetQuizSessionParticipantsAction extends Action
{
    public function run(?array $params): Collection
    {
        return app(GetQuizSessionParticipantsTask::class)->run();
    }
}
