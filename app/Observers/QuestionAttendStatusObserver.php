<?php

namespace App\Observers;

use App\Events\QuestionAttendStatusCrudEvent;
use App\Models\QuestionAttendStatus;

class QuestionAttendStatusObserver
{
    public function created(QuestionAttendStatus $model): void
    {
        broadcast(new QuestionAttendStatusCrudEvent($model, 'created'));
    }
}
