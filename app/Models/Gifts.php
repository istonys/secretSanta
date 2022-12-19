<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'user_id',
        'reserved_by'
    ];
}
