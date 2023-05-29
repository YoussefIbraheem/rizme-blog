<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','published' , 'user_id', 'thumbnail'];
    
    public function users(): BelongsTo // one to many relationship (one user has many posts)
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comments(): HasMany  // one to many relationship (one post has many comments)
    {
        return $this->hasMany(Comment::class);
    }

    public function categories() : BelongsToMany // many to many relationship (many posts has many comments)
    {
        return $this->belongsToMany(Category::class, 'categories_posts' , 'post_id' , 'category_id');
    }

}
