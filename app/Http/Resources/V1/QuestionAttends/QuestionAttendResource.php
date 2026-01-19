<?php

namespace App\Http\Resources\V1\QuestionAttends;

use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use App\Http\Resources\V1\Questions\QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionAttendResource extends JsonResource
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
            'question_id' => $this->whenHas('question_id'),
            'guest_user_id' => $this->whenHas('guest_user_id'),
            'attempt' => $this->whenHas('attempt'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'question' => new QuestionResource($this->whenLoaded('question')),
            'guest_user' => new GuestUserResource($this->whenLoaded('guestUser')),
            'statues' => QuestionAttendStatusResource::collection($this->whenLoaded('statuses')),
        ];
    }
}
