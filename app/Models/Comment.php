<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function getPost()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}

