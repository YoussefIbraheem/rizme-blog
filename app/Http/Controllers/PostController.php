<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function viewHomePagePosts(){
        $posts = Post::all();
        return view('front.index', compact('posts'));
    }
    
    public function myBlogPosts(){
        $posts = Post::findOrFail();
        return view('front.myblog' , compact('posts'));
}
}