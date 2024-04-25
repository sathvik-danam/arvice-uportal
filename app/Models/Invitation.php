<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'event_title', 'event_type', 'user_id', 'hosted_by', 'name', 'phone', 'email', 'co_hosted_by', 'event_date', 'event_time', 'event_phone', 'landmark', 'address', 'city', 'state', 'zip', 'message', 'slug',
    ];
}
