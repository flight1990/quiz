<?php

namespace App\Http\Resources\V1\QuizAttempts;

use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use App\Http\Resources\V1\Quizzes\QuizResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizAttemptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'status' => $this->whenHas('status'),
            'quiz_id' => $this->whenHas('quiz_id'),
            'guest_user_id' => $this->whenHas('guest_user_id'),
            'started_at' => $this->whenHas('started_at'),
            'completed_at' => $this->whenHas('completed_at'),
            'quiz' => new QuizResource($this->whenLoaded('quiz')),
            'guest_user' => new GuestUserResource($this->whenLoaded('guestUser')),
        ];
    }
}
