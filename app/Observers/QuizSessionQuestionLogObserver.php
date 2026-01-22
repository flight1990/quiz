<?php

namespace App\Observers;

use App\Events\QuizSessionQuestionLogCrudEvent;
use App\Models\QuizSessionQuestionLog;

class QuizSessionQuestionLogObserver
{
    public function created(QuizSessionQuestionLog $model): void
    {
        broadcast(new QuizSessionQuestionLogCrudEvent($model, 'created'));
    }

    public function updated(QuizSessionQuestionLog $model): void
    {

        broadcast(new QuizSessionQuestionLogCrudEvent($model, 'updated'));
    }

    public function deleted(QuizSessionQuestionLog $model): void
    {
        broadcast(new QuizSessionQuestionLogCrudEvent($model, 'deleted'));
    }
}
