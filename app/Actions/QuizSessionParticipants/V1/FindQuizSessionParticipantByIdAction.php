<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Models\QuizSessionParticipant;
use App\Tasks\QuizSessionParticipants\V1\FindQuizSessionParticipantByIdTask;

class FindQuizSessionParticipantByIdAction extends Action
{
    public function run(int $id): QuizSessionParticipant
    {
        return app(FindQuizSessionParticipantByIdTask::class)->run($id);
    }
}
