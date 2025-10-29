<?php

namespace App\Events;

use App\Models\Quiz;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QuizCrudEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Quiz $model;
    public string $operation;

    public function __construct(Quiz $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("Quiz $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("quiz.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "quiz.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Quiz $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
