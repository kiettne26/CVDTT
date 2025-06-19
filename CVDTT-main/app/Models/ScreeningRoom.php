<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScreeningRoom extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'roomId';

    protected $fillable = [
        'roomName', 'capacity', 'roomType', 'isAvailable'
    ];

    public function showTimes()
    {
        return $this->hasMany(ShowTime::class, 'roomId', 'roomId');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'roomId', 'roomId');
    }
}
