<?php

namespace App\Observers;

use App\Events\AnswerCrudEvent;
use App\Models\Answer;

class AnswerObserver
{
    public function created(Answer $model): void
    {
        broadcast(new AnswerCrudEvent($model, 'created'));
    }

    public function updated(Answer $model): void
    {
        broadcast(new AnswerCrudEvent($model, 'updated'));
    }

    public function deleted(Answer $model): void
    {
        broadcast(new AnswerCrudEvent($model, 'deleted'));
    }
}
