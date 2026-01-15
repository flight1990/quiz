<?php

namespace App\Events;

use App\Models\Question;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QuestionCrudEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Question $model;
    public string $operation;

    public function __construct(Question $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("Question $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("question.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "question.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Question $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
