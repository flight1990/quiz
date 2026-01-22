<?php

namespace App\Http\Resources\V1\QuizSessions;

use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use App\Http\Resources\V1\Options\OptionResource;
use App\Http\Resources\V1\Questions\QuestionResource;
use App\Http\Resources\V1\Quizzes\QuizResource;
use App\Http\Resources\V1\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizSessionParticipantResource extends JsonResource
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
            'quiz_session_id' => $this->whenHas('quiz_session_id'),
            'guest_user_id' => $this->whenHas('guest_user_id'),
            'joined_at' => $this->whenHas('joined_at'),
            'left_at' => $this->whenHas('left_at'),
            'guest_user' => new GuestUserResource($this->whenLoaded('guestUser')),
            'quiz_session' => new QuizSessionResource($this->whenLoaded('session')),
        ];
    }
}
