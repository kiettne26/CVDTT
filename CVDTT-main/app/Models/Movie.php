<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'movieId';

    protected $fillable = [
        'title', 'director', 'genre', 'duration', 'releaseDate', 'description', 'status' ,'poster', 'poster_original_name'
    ];

    public function showTimes()
    {
        return $this->hasMany(ShowTime::class, 'movieId', 'movieId');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'movieId', 'movieId');
    }
}
