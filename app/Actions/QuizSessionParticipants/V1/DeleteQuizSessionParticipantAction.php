<?php

namespace App\Actions\QuizSessionParticipants\V1;

use App\Actions\Action;
use App\Tasks\QuizSessionParticipants\V1\DeleteQuizSessionParticipantTask;

class DeleteQuizSessionParticipantAction extends Action
{
    public function run(int $id): int
    {
        return app(DeleteQuizSessionParticipantTask::class)->run($id);
    }
}
