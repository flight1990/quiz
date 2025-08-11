<?php

namespace App\Http\Resources\V1\Users;

use App\Http\Resources\V1\Quizzes\QuizResource;
use App\Http\Resources\V1\Roles\RoleResource;
use App\Http\Resources\V1\Units\UnitResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->whenHas('name'),
            'email' => $this->whenHas('email'),
            'unit_id' => $this->whenHas('unit_id'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'unit' => new UnitResource($this->whenLoaded('unit')),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'quizzes' => QuizResource::collection($this->whenLoaded('quizzes')),
        ];
    }
}
