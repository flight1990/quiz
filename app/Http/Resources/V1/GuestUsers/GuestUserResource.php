<?php

namespace App\Http\Resources\V1\GuestUsers;

use App\Http\Resources\V1\Units\UnitResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestUserResource extends JsonResource
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
            'uuid' => $this->whenHas('uuid'),
            'name' => $this->whenHas('name'),
            'ip_address' => $this->whenHas('ip_address'),
            'user_agent' => $this->whenHas('user_agent'),
            'unit_id' => $this->whenHas('unit_id'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'unit' => new UnitResource($this->whenLoaded('unit')),
        ];
    }
}
