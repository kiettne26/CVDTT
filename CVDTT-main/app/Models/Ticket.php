<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = 'ticketId';

    protected $fillable = [
        'showtimeId', 'movieId', 'roomId', 'seatNumber', 'price', 'status'
    ];

    public function showTime()
    {
        return $this->belongsTo(ShowTime::class, 'showtimeId', 'showtimeId');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movieId', 'movieId');
    }

    public function screeningRoom()
    {
        return $this->belongsTo(ScreeningRoom::class, 'roomId', 'roomId');
    }
}
