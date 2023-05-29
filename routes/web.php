<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//public pages
Route::get('/', [PostController::class,'viewHomePagePosts']); //get all posts
Route::get('/category/{id}', [PostController::class,'viewHomePagePostsByCategory']); //get all posts by category
Route::get('/post-details/{id}', [PostController::class,'PostDetails']); //get post details
Route::get('/about',function (){return view('front/about');} ); //about page
Route::get('/contact-us',[ContactController::class,'viewContactPage']); // get contact form
Route::post('/send-message',[ContactController::class,'sendMessage']); // send message action
//login required pages and actions
Route::middleware([ //Jetstream Middleware
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //login only
    Route::get('/my-posts', [PostController::class,'myBlogPosts']); // get user's posts
    Route::post('/create-post',[PostController::class,'createPost']); // create a new post
    Route::put('/update-post/{id}',[PostController::class,'updatePost']); // update existing post
    Route::delete('/delete-post/{id}',[PostController::class,'deletePost']); // delete user's single post
    Route::post('add-comment/{id}',[PostController::class,'addComment']); // add comment on another user's post
    Route::delete('/delete-comment/{id}',[PostController::class,'deleteComment']); //delete comment
    //admin and mod login only
    Route::middleware('messages.access')->group(function(){
    Route::get('/messages',[MessageController::class,'showMessagesList']); //show the message table
    Route::post('send-email/{id}',[MessageController::class,'replyToUser']); // reply to user quiries via email
    Route::post('change-status/{id}',[MessageController::class,'changeMessageStatus']); // change case status 
    });


});
