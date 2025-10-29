<?php

namespace App\Observers;

use App\Events\QuizCrudEvent;
use App\Models\Quiz;

class QuizObserver
{
    public function created(Quiz $model): void
    {
        broadcast(new QuizCrudEvent($model, 'created'));
    }

    public function updated(Quiz $model): void
    {

        broadcast(new QuizCrudEvent($model, 'updated'));
    }

    public function deleted(Quiz $model): void
    {
        broadcast(new QuizCrudEvent($model, 'deleted'));
    }
}
