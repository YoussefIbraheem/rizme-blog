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
    
    public function users(): BelongsTo 
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_posts' , 'post_id' , 'category_id');
    }

}
