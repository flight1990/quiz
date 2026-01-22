<?php

namespace App\Observers;

use App\Events\QuizSessionCrudEvent;
use App\Models\QuizSession;

class QuizSessionObserver
{
    public function created(QuizSession $model): void
    {
        broadcast(new QuizSessionCrudEvent($model, 'created'));
    }

    public function updated(QuizSession $model): void
    {

        broadcast(new QuizSessionCrudEvent($model, 'updated'));
    }

    public function deleted(QuizSession $model): void
    {
        broadcast(new QuizSessionCrudEvent($model, 'deleted'));
    }
}
