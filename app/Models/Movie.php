<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'writers',
        'stars',
        'sypnosis',
        'poster_url',
        'trailer_url'

    ];
}