<?php

namespace App\Services;

use App\Models\Album;
use Illuminate\Support\Str;

class AlbumService
{
    public function create(array $data): Album
    {
        $data['slug'] = Str::slug($data['name']);
        
        $album = Album::create($data);
        
        if (isset($data['artist_ids'])) {
            $album->artists()->sync($data['artist_ids']);
        }
        
        return $album;
    }
    
    public function update(Album $album, array $data): Album
    {
        $data['slug'] = Str::slug($data['name']);
        
        $album->update($data);
        
        if (isset($data['artist_ids'])) {
            $album->artists()->sync($data['artist_ids']);
        }
        
        return $album;
    }
    
    public function delete(Album $album): void
    {
        $album->delete();
    }
}
