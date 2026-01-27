<?php

namespace App\Observers;

use App\Events\QuizSessionCrudEvent;
use App\Models\QuizSession;

use Illuminate\Support\Facades\Log;
use Throwable;

class QuizSessionObserver
{
    public function created(QuizSession $model): void
    {
        $this->safeBroadcast($model, 'created');
        //broadcast(new QuizSessionCrudEvent($model, 'created'));

    }

    public function updated(QuizSession $model): void
    {
        $this->safeBroadcast($model, 'updated');
        //broadcast(new QuizSessionCrudEvent($model, 'updated'));
    }

    public function deleted(QuizSession $model): void
    {
        $this->safeBroadcast($model, 'deleted');
        //broadcast(new QuizSessionCrudEvent($model, 'deleted'));
    }

    private function safeBroadcast(QuizSession $quizSession, string $operation): void
    {
        try {
            
            broadcast(new QuizSessionCrudEvent($quizSession, $operation));
            
            Log::channel('broadcast_events')->info("Broadcast отправлен успешно: quiz.session.$operation", [
                'session_id' => $quizSession->id,
                'operation' => $operation
            ]);
            
        } catch (Throwable $e) {
            /* Ошибка broadcast, но без вылета сервиса и выдачи HTTP 500*/
            Log::channel('broadcast_events')->error("Ошибка broadcast: " . $e->getMessage(), [
                'session_id' => $quizSession->id,
                'operation' => $operation                
            ]);
            /*'exception' => $e*/
        }
    }
}
