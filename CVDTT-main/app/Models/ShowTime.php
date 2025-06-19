<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    protected $primaryKey = 'showtimeId';

    protected $fillable = [
        'movieId', 'date', 'startTime', 'roomId'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movieId', 'movieId');
    }

    public function screeningRoom()
    {
        return $this->belongsTo(ScreeningRoom::class, 'roomId', 'roomId');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'showtimeId', 'showtimeId');
    }
}
