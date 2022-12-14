<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;
    protected $fillable = [
        'invited_by',
        'invited_to',
        'invitee',
        'invite_by_info',
        'invite_to_info',
        'invitee_info'
    ];
}
