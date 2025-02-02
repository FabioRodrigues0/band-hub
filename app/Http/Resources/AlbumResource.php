<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'year_release' => $this->year_release,
            'slug' => $this->slug,
            'band' => $this->whenLoaded('bands'),
            'artists' => $this->whenLoaded('artists'),
            'tracks' => $this->whenLoaded('tracks'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
