<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'foods';

    protected $primaryKey = 'foodId';

    protected $fillable = [
        'name', 'price', 'description', 'poster'
    ];
}
