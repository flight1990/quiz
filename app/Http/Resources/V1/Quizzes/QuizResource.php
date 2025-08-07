<?php

namespace App\Http\Resources\V1\Quizzes;

use App\Http\Resources\V1\Questions\QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
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
            'title' => $this->whenHas('title'),
            'is_anonymous' => $this->whenHas('is_anonymous'),
            'is_active' => $this->whenHas('is_active'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'questions' => QuestionResource::collection($this->whenLoaded('questions')),
        ];
    }
}
