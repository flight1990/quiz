<?php

namespace App\Observers;

use App\Events\QuizSessionParticipantCrudEvent;
use App\Models\QuizSessionParticipant;

class QuizSessionParticipantObserver
{
    public function created(QuizSessionParticipant $model): void
    {
        broadcast(new QuizSessionParticipantCrudEvent($model, 'created'));
    }

    public function updated(QuizSessionParticipant $model): void
    {

        broadcast(new QuizSessionParticipantCrudEvent($model, 'updated'));
    }

    public function deleted(QuizSessionParticipant $model): void
    {
        broadcast(new QuizSessionParticipantCrudEvent($model, 'deleted'));
    }
}
