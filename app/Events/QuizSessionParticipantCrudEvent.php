<?php

namespace App\Events;

use App\Models\QuizSessionParticipant;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QuizSessionParticipantCrudEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public QuizSessionParticipant $model;
    public string $operation;

    public function __construct(QuizSessionParticipant $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("Quiz session participant $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("quiz.session.participant.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "quiz.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Quiz session participant $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
