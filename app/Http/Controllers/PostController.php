<?php

namespace App\Http\Controllers;

use App\Jobs\PostFunctions;
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
    public function viewHomePagePosts(){
       
        

        $posts = Post::where('published',1)->orderByDesc('created_at')->get();
       
        return view('front.index', compact('posts'));
    }

    // view posts with the given category
    public function viewHomePagePostsByCategory($id)
    { 
           $posts = Post::whereHas('categories' , function($query) use ($id) {
            $query->where('categories.id',$id);
           })->orderByDesc('created_at')->get();
           return view('front.index', compact('posts'));
    }
    
    //view user posts
    public function myBlogPosts(){
        $user = Auth::user()->id;
        $posts = Post::Where('user_id', '=', $user)->orderByDesc('created_at')->get();
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
    $thumbnail = Storage::putFile('thumbnails',$request->thumbnail); //store thumbnail
    $thumbnail =  'storage/'.$thumbnail;//add "storage/" to match the correct directory in html
    } 
    $loggedUser = Auth::user()->id; //get logged in user id
    
    

    $newPost = [// save the post to the database
        'title'=>$request->title,
        'body'=>$request->body,
        'thumbnail'=>$thumbnail, //add image path with "storage/" included
        'user_id'=>$loggedUser
    ];

   // creates a queue for 10 seconds then create the new post
 PostFunctions::dispatch($newPost , $request->categories)->delay(now()->addSeconds(10));

 // redirect to the post's show page
 session()->flash('success',"Post Added Successfully It will be displayed in the next 5-10 seconds!");
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
            $thumbnail = Storage::putFile('thumbnails',$request->thumbnail); // save the new thumbnail
            $thumbnail =  'storage/'.$thumbnail; // the word "storage/"
        }else{//if there is no new image
            if(!$request->checkThumbnail){ //check if user wants to remove the image or not
                $thumbnail = $post->thumbnail; //keep the old image
            }
        }
        
        $loggedUser = Auth::user()->id;
        // save the post to the database
        $post->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'thumbnail'=>$thumbnail, //add image path with "storage/" included
            'user_id'=>$loggedUser
        ]);

        // redirect to the post's show page
        session()->flash('success',"Post Updated Successfully");
        return redirect()->back();
    }

    //delete a post
    public function deletePost(Request $request, $id){
        $post = Post::findOrFail($id);
        if(!empty($post->thumbnail)){//check if there is an image
            $imageDirectory = substr($post->thumbnail,8); //remove the word "storage/"
            Storage::delete($imageDirectory); //remove the image directory
        }
        $post->delete();
        session()->flash('success',"Post Deleted Successfully");
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
        session()->flash('success',"Comment Added Successfully");
        return redirect()->back();
    }

    //delete comment

    public function deleteComment($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        session()->flash('success',"Comment Deleted Successfully");
        return redirect()->back();
    }
  
}