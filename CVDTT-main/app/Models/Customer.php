<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'customerId';

    protected $fillable = [
        'email', 'password', 'name', 'gender', 'dob', 'phone'
    ];

    // Quan hệ: Customer thuộc về User
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
