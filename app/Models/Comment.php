<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment' , 'user_id' , 'post_id'];

    public function posts() : BelongsTo
    {
        return $this->belongsTo(Post::class , 'post_id');
    }

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }


}
