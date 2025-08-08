<?php

namespace App\Http\Resources\V1\Answers;

use App\Http\Resources\V1\GuestUsers\GuestUserResource;
use App\Http\Resources\V1\Options\OptionResource;
use App\Http\Resources\V1\Questions\QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
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
            'option_id' => $this->whenHas('option_id'),
            'other' => $this->whenHas('other'),
            'question' => new QuestionResource($this->whenLoaded('question')),
            'guest_user' => new GuestUserResource($this->whenLoaded('guestUser')),
            'option' => new OptionResource($this->whenLoaded('option')),
        ];
    }
}
