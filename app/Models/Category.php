<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = ['category'];

    public function posts() : BelongsToMany 
    {
        return $this->belongsToMany(Post::class , 'categories_posts' , 'category_id' , 'post_id');
    }

   

    use HasFactory;
}
