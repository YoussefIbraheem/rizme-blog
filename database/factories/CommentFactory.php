<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=Faker::create();
        return [
            'body'=>$faker->paragraph(),
            'user_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id,
        ];
    }
}
