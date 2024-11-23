<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Band extends Model
{
    /** @use HasFactory<\Database\Factories\BandFactory> */
    use HasFactory, Notifiable;

    public static array $validationRules = [
        'name' => 'required',
        'description' => 'required',
        'genres' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'genres',
        'image',
    ];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'artist_band');
    }
}
