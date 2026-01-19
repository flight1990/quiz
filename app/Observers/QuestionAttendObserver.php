<?php

namespace App\Observers;

use App\Events\QuestionAttendCrudEvent;
use App\Models\QuestionAttend;

class QuestionAttendObserver
{
    public function created(QuestionAttend $model): void
    {
        broadcast(new QuestionAttendCrudEvent($model, 'created'));
    }
}
