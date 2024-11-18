<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Band extends Model
{
    use HasFactory, Notifiable;

    private array $validationRules = [
        'name' => 'required',
        'description' => 'required',
        'genres' => 'required',
        'image' => 'required',
        'artist_id' => 'required',
        'album_id' => 'required'
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
        'artist_id',
        'album_id',
    ];
}
