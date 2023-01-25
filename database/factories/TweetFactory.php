<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $user = User::all()->random();
        // if(!$user)
        //     $user = User::factory(1)->create();
        // return [
        //     "text" => fake()->paragraph(),
        //     'user_id' => $user->id(),
        // ];
    }
}
