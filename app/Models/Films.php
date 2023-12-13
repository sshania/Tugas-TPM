<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;

    protected $table ='ms_films';

    protected $fillable = [
    'FilmName', 
    'FilmDirector', 
    'MaturityRatingId', 
    'FilmDuration', 
    'FilmStatusID', 
    'FilmSynopsis', 
    'FilmWriter', 
    'FilmPoster',
    ];

    public function maturityRating()
    {
        return $this->belongsTo('App\Models\MaturityRating','MaturityRatingId');
    }

    public function filmStatus()
    {
        return $this->belongsTo('App\Models\FilmStatus','FilmStatusID');
    }

    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule','FilmId');
    }
}