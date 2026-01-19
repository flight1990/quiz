<?php

namespace App\Events;

use App\Models\QuestionAttendStatus;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QuestionAttendStatusCrudEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public QuestionAttendStatus $model;
    public string $operation;

    public function __construct(QuestionAttendStatus $model, string $operation)
    {
        $this->model = $model;
        $this->operation = $operation;

        Log::channel('events')->info("QuestionAttendStatus $this->operation");
    }


    public function broadcastOn(): array
    {
        return [
            new Channel("question.attend.status.$this->operation"),
        ];
    }

    public function broadcastAs(): string
    {
        return "question.attend.status.$this->operation";
    }

    public function broadcastWith(): array
    {
        return array(
            'message' => "Question attend status $this->operation",
            'data' => $this->model->toArray()
        );
    }
}
