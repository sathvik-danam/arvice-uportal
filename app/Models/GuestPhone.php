<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestPhone extends Model
{
    protected $fillable = [
        'phone', 'user_id', 'relation', 'name',
    ];
}
