<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dailyPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('access_type','=','admin')->first()->id;
        
        Post::create([
            'Title'=>"Good Morning",
            'body'=>"it's a new day and a new beginning",
            'thumbnail'=>'storage/morning.jpeg',
            'user_id'=>$user
        ]);
        
    }
}
