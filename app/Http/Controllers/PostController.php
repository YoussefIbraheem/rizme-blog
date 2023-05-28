<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    //view all posts
    public function viewHomePagePosts($id=''){
        if($id == ''){
            $posts = Post::all();
        }else{
           $posts = Post::whereHas('categories' , function($query) use ($id) {
            $query->where('categories.id',$id);
           })->get();
        }
        //dd($posts);
        return view('front.index', compact('posts'));
    }
    
    //view user posts
    public function myBlogPosts(){
        $user = Auth::user()->id;
        $posts = Post::Where('user_id', '=', $user)->get();
        return view('front.my-blog' , compact('posts'));
    }

    //view single post and comments
    public function PostDetails($id){
        
        $post = Post::findorFail($id);
        $comments = Comment::where('post_id', '=', $id)->get();

        return view('front.post-details' , compact('post','comments'));
    }

    //create a new post
    public function createPost(Request $request)
{
    // validate the request data
    $validatedData = $request->validate([
        'title' => 'required|max:100',
        'body' => 'required|max:1000',
        'thumbnail'=>'mimes:jpeg,png,jpg,gif|image',
    ]);
    $thumbnail = null; // default thumbnail

    
    //create image name and store
    if(!empty($request->thumbnail)){ //work only if thumbnail is added
    $thumbnail = Storage::putFile('thumbnails',$request->thumbnail);
    $thumbnail =  'storage/'.$thumbnail;//add "storage/" to match the correct directory in html
    } 
    $loggedUser = Auth::user()->id;
    
    $newPost = Post::create([// save the post to the database
        'title'=>$request->title,
        'body'=>$request->body,
        'thumbnail'=>$thumbnail,
        'user_id'=>$loggedUser
    ]);
 
    foreach ($request->categories as $category_id) { //save each selected category to the created post and save it in the pivot table
        DB::table('categories_posts')->insert([
                'post_id' => $newPost->id,
                'category_id' => $category_id
            ]);
    }
    // redirect to the post's show page
    
    return redirect()->back();
}

    //update a post
    public function updatePost(Request $request, $id){
        // validate the request data
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'title' =>'required|max:100',
            'body' =>'required|max:1000',
            'thumbnail'=>'mimes:jpeg,png,jpg,gif|image',
        ]);
        $thumbnail = null; // default thumbnail
        //update image name and store
        
        if(!empty($request->thumbnail)){//check if there is an image newly added
            if(!empty($post->thumbnail)){ //check if there was a photo already existing
                $imageDirectory = substr($post->thumbnail,8); //remove the word "storage/"
                Storage::delete($imageDirectory); //delete the image
            }
            $thumbnail = Storage::putFile('thumbnails',$request->thumbnail);
            $thumbnail =  'storage/'.$thumbnail;
        }else{
            if(!$request->checkThumbnail){
                $thumbnail = $post->thumbnail;
            }
        }
        
        $loggedUser = Auth::user()->id;
        // save the post to the database
        $post->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'thumbnail'=>$thumbnail,
            'user_id'=>$loggedUser
        ]);

        // redirect to the post's show page
        
        return redirect()->back();
    }

    //delete a post
    public function deletePost(Request $request, $id){
        $post = Post::findOrFail($id);
        if(!empty($post->thumbnail)){//check if there is an image
            $imageDirectory = substr($post->thumbnail,8); //remove the word "storage/"
            Storage::delete($imageDirectory);
        }
        $post->delete();
           return redirect()->back();
    }

    //add comment

    public function addComment(Request $request, $id){
        $validatedData = $request->validate([
            'comment'=>'required|max:500'
        ]);
        $loggedUser = Auth::user()->id;
        Comment::create([
            'body'=>$request->comment,
            'user_id'=>$loggedUser,
            'post_id'=>$id
        ]);
        return redirect()->back();
    }

    //delete comment

    public function deleteComment($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
  
}