<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillables = ['category'];

    public function posts() : BelongsToMany 
    {
        return $this->belongsToMany(Post::class);
    }
    use HasFactory;
}
