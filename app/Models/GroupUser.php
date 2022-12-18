<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;
    protected $fillable=[
        'group_id',
        'user_id',
        'reserved',
        'gifts_to'
    ];
}
