<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'email', 'password', 'role', 'email_verified_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Quan hệ: Một user là customer
    public function customer()
    {
        return $this->hasOne(Customer::class, 'email', 'email');
    }
}
