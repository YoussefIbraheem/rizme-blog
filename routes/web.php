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
Route::get('/{id?}', [PostController::class,'viewHomePagePosts']);
Route::get('/post-details/{id}', [PostController::class,'PostDetails']);
Route::get('/about',function (){return view('front/about');} );
Route::get('/contact-us',[ContactController::class,'viewContactPage']);
Route::post('/send-message',[ContactController::class,'sendMessage']);
//login required pages and actions
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //login only
    Route::get('/my-posts', [PostController::class,'myBlogPosts']);
    Route::post('/create-post',[PostController::class,'createPost']);
    Route::put('/update-post/{id}',[PostController::class,'updatePost']);
    Route::delete('/delete-post/{id}',[PostController::class,'deletePost']);
    Route::post('add-comment/{id}',[PostController::class,'addComment']);
    Route::delete('/delete-comment/{id}',[PostController::class,'deleteComment']);
    //admin and mod login only
    Route::middleware('messages.access')->group(function(){
    Route::get('/messages',[MessageController::class,'showMessagesList']);
    Route::post('send-email/{id}',[MessageController::class,'replyToUser']);
    Route::post('change-status/{id}',[MessageController::class,'changeMessageStatus']);
    });


});
