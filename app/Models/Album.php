<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Album extends Model
{
    use HasFactory, Notifiable;

    private array $validationRules = [
        'name' => 'required',
        'description' => 'nullable',
        'image' => 'nullable|url',
        'year_release' => 'required',
        'band_id' => 'required|exists:bands,id'
    ];

    protected $fillable = [
        'name',
        'description',
        'image',
        'year_release',
        'band_id',
        'slug',
    ];

    public function band(): BelongsTo
    {
        return $this->belongsTo(Band::class);
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}
