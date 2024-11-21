<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Band extends Model
{
    /** @use HasFactory<\Database\Factories\BandFactory> */
    use HasFactory, Notifiable;

    public array $validationRules = [
        'name' => 'required',
        'description' => 'required',
        'genres' => 'required',
        'photo' => 'required',
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
        'photo',
        'artist_id',
        'album_id',
    ];
}
