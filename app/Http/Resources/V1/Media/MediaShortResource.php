<?php

namespace App\Http\Resources\V1\Media;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MediaShortResource extends JsonResource
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
            'original_name' => $this->whenHas('original_name'),
            'extension' => $this->whenHas('extension'),
        ];
    }
}
