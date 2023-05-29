<?php

namespace App\Http\Controllers;

use App\Filament\Resources\CategoryResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class ApiPostController extends Controller
{
    //api to get all posts ordered descending
    public function getPostsApi(){
        $posts = Post::orderByDesc('created_at')->get();
       return PostResource::collection($posts);
    }
    //api to get single post using id
    public function getSinglePostApi($id){
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }
}
