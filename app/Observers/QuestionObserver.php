<?php

namespace App\Observers;

use App\Events\QuestionCrudEvent;
use App\Models\Question;

class QuestionObserver
{
    public function created(Question $model): void
    {
        broadcast(new QuestionCrudEvent($model, 'created'));
    }

    public function updated(Question $model): void
    {

        broadcast(new QuestionCrudEvent($model, 'updated'));
    }

    public function deleted(Question $model): void
    {
        broadcast(new QuestionCrudEvent($model, 'deleted'));
    }
}
