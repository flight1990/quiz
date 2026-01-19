<?php

namespace App\Events;

use App\Models\QuestionAttend;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QuestionAttendCrudEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public QuestionAttend $model;
    public string $operation;

    public function __construct(QuestionAttend $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("QuestionAttend $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("question.attend.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "question.attend.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Question attend $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
