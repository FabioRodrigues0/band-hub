<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Artist extends Model
{
    use HasFactory, Notifiable;

    public static array $validationRules = [
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'genres' => 'nullable|string'
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'genres',
        'image'
    ];

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class, 'album_artist');
    }

    public function bands(): BelongsToMany
    {
        return $this->belongsToMany(Band::class, 'artist_band');
    }
}
