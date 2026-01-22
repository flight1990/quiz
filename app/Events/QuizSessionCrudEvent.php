<?php

namespace App\Events;

use App\Models\QuizSession;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QuizSessionCrudEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public QuizSession $model;
    public string $operation;

    public function __construct(QuizSession $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("Quiz session $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("quiz.session.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "quiz.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Quiz session $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
