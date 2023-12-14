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

        /**
     * Get the user associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the category associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the comments associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function getComments()
    {
        return $this->hasMany(Comment::class);
    }

}
