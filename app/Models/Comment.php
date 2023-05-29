<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body' , 'user_id' , 'post_id'];

    public function posts() : BelongsTo // one to many relationship (one post has many comments)
    {
        return $this->belongsTo(Post::class , 'post_id');
    }

    public function users() : BelongsTo // one to many relationship (one user has many comments)
    {
        return $this->belongsTo(User::class , 'user_id');
    }


}
