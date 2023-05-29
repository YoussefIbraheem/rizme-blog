<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //to fill all tables with one command (migrate --seed)
         User::factory(4)->create();
         Post::factory(10)->create();
         Comment::factory(5)->create();
         Category::factory(5)->create();
         Message::factory(5)->create();
         $categories_posts = DB::table('categories_posts'); 
         for($i = 0 ; $i < 5 ; $i++){ // to fill categories_posts table (pivot)
            $categories_posts->insert([
                'category_id' => Category::all()->random()->id ,
                'post_id' =>Post::all()->random()->id 
                ]);
         }
        User::factory()->create([ // to generate admin with god access
            'name' => 'admin',
            'email' => 'admin@rizme.com',
            'password' => bcrypt('password'),
            'access_type'=>'admin'
        ]);
        User::factory()->create([ // to generate admin with god access
            'name' => 'moderator',
            'email' => 'moderator@rizme.com',
            'password' => bcrypt('password'),
            'access_type'=>'moderator'
        ]);
        User::factory()->create([ // to generate admin with god access
            'name' => 'user',
            'email' => 'user@rizme.com',
            'password' => bcrypt('password'),
            'access_type'=>'user'
        ]);
    }
}
