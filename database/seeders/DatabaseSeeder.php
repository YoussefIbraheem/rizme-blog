<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Post::factory(10)->create();
         Comment::factory(10)->create();
         Category::factory(5)->create();
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@rizme.com',
            'password' => bcrypt('password'),
            'access_type'=>'admin'
        ]);
    }
}
