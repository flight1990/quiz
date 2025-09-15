<?php

namespace App\Http\Resources\V1\Statistics;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizStatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'quiz_id' => $this->resource->quiz_id,
            'unit_id' => $this->resource->unit_id,
            'total_users' => $this->resource->total_users,
        ];
    }
}
