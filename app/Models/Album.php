<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Album extends Model
{
    use HasFactory, Notifiable;

    private array $validationRules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'required',
        'year_release' => 'required'
    ];

    protected $fillable = [
        'name',
        'description',
        'image',
        'year_release',
    ];
}
