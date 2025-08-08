<?php

namespace App\Http\Resources\V1\QuizUser;

use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use App\Http\Resources\V1\Quizzes\QuizResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizUserResource extends JsonResource
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
            'quiz_id' => $this->whenHas('quiz_id'),
            'guest_user_id' => $this->whenHas('guest_user_id'),
            'completed_at' => $this->whenHas('completed_at'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'quiz' => new QuizResource($this->whenLoaded('quiz')),
            'guest_user' => new GuestUserResource($this->whenLoaded('guestUser')),
        ];
    }
}
