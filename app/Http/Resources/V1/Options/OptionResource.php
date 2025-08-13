<?php

namespace App\Http\Resources\V1\Options;

use App\Http\Resources\V1\Questions\QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
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
            'question_id' => $this->whenHas('question_id'),
            'is_correct' => $this->whenHas('is_correct'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'question' => new QuestionResource($this->whenLoaded('question')),
        ];
    }
}
