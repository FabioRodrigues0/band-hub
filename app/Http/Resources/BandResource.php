<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BandResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'slug' => $this->slug,
            'description' => $this->when(isset($this->description), $this->description),
            'albums' => $this->whenLoaded('albums'),
            'artists' => $this->whenLoaded('artists'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
