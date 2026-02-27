<?php

namespace App\Http\Resources\V1\Media;

use App\Http\Resources\V1\Questions\QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MediaResource extends JsonResource
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
            'url' => Storage::disk($this['disk'])->url($this['path']),
            'disk' => $this->whenHas('disk'),
            'path' => $this->whenHas('path'),
            'original_name' => $this->whenHas('original_name'),
            'mime_type' => $this->whenHas('mime_type'),
            'extension' => $this->whenHas('extension'),
            'size' => $this->whenHas('size'),
            'questions' => QuestionResource::collection($this->whenLoaded('questions')),
        ];
    }
}
