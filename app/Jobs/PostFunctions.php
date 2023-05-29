<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class PostFunctions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $newPost, public $selectedCategories)
    {
       $this->newPost = $newPost;
       $this->selectedCategories = $selectedCategories;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $this->newPost = Post::create($this->newPost); // store a new post

        foreach ($this->selectedCategories as $category_id) { //save each selected category to the created post and save it in the pivot table
            DB::table('categories_posts')->insert([
                    'post_id' => $this->newPost->id,
                    'category_id' => $category_id
                ]);
        }

        
    }
    
}
