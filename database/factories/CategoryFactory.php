<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=Faker::create();
        $categories_posts = DB::table('categories_posts');
        $categories_posts->insert([
        'category_id' => Category::all()->random()->id ,
        'post_id' =>Post::all()->random()->id 
        ]);
        return [
            'category'=>$faker->word(),
             
        ];
    }
}
