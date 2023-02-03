<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomRegistration extends Model
{
    protected $fillable = [
        'room_id',
        'mssv',
        'name',
        'status',
        'cost'
    ];
}
