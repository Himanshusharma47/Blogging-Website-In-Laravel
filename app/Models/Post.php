<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = false;

    function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
