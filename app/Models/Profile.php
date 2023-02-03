<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'mssv', 'sdt','vien', 'gender','email', 'khoa', 'quequan', 'image' 
    ];
    
}
