<?php

namespace App\Http\Resources\V1\Statistics;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionStatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'question_id' => $this->resource->question_id,
            'option_id' => $this->resource->option_id,
            'total_users' => $this->resource->total_users,
        ];
    }
}
