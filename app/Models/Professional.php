<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $fillable = [
        'profession_name', 'profession', 'name', 'phone', 'email', 'type', 'city', 'address', 'about', 'photo','slug','user_id' 
    ];
 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }  
}
 