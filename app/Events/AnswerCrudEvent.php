<?php

namespace App\Events;

use App\Models\Answer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AnswerCrudEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Answer $model;
    public string $operation;

    public function __construct(Answer $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("Answer $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("answer.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "answer.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Answer $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
