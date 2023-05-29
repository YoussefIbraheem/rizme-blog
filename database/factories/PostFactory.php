<?php

namespace Database\Factories;

 
require_once 'vendor/autoload.php';
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=Faker::create(); //return random data
        return [
            'title' =>$faker->word(),
            'body' => $faker->paragraph(),
            'thumbnail' => $faker->imageUrl(640, 480, 'animals', true),
            'user_id' => User::all()->random()->id
        ];
    }
}
