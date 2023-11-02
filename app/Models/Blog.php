<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    
    public function getImageAttribute($value) {
        return $value??'images/64f7da417e02e-how-to-create-a-blog-with-laravel.jpg';
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

}
