<?php

namespace App\Http\Resources\V1\Questions;

use App\Http\Resources\V1\Quizzes\QuizResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'text' => $this->whenHas('text'),
            'order' => $this->whenHas('order'),
            'answer_type' => $this->whenHas('answer_type'),
            'answer_timer' => $this->whenHas('answer_timer'),
            'quiz_id' => $this->whenHas('quiz_id'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'quiz' => new QuizResource($this->whenLoaded('quiz')),
        ];
    }
}
