<?php

namespace App\Events;

use App\Models\QuizSessionQuestionLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QuizSessionQuestionLogCrudEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public QuizSessionQuestionLog $model;
    public string $operation;

    public function __construct(QuizSessionQuestionLog $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("Quiz session question log $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("quiz.session.question.log.{$this->model->quiz_session_id}")
            //new Channel("quiz.session.question.log.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "quiz.session.question.log.$this->operation";
        //return "quiz.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Quiz session question log $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
