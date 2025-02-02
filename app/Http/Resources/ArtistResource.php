<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'slug' => $this->slug,
            'description' => $this->description,
            'albums' => $this->whenLoaded('albums'),
            'bands' => $this->whenLoaded('bands'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
