<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    use HasFactory;

    // Optionally specify the table if it's not the plural form of the model name
    protected $table = 'posts';

    // Define which attributes are assignable (for mass assignment)
    protected $fillable = [
        'category', 'profession', 'about', 'photo1', 'photo2', 'slug', 'city', 
    ];

    // If you have timestamps and you need to specify custom names or disable them
    public $timestamps = true;
}
