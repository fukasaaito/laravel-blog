<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    //conect to user table with foreign key.
    //without foreign key we cannot connect it.
    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }
}

