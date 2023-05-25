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
    
    public function myPosts(){
        $posts = Post::findOrFail(Auth::user()->id);
        return view('front.myblog', compact($posts));
}
}