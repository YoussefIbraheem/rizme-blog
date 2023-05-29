<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
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
            'subject'=>$faker->word(),
            'body'=>$faker->paragraph(),
            'email'=>$faker->email(),
            'name'=>$faker->name(),
            'sorted'=>$faker->boolean()
        ];
    }
}
