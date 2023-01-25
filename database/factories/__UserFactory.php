<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arabicName = ["احمد","علي","اشرف","سمير","خالد","باتمان", "مصطفي","مهاب","شريف","جابر","كريم"];
        $name = $this->faker->randomElement($arabicName);
        return [
            'name' => $name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'profile_id' => "@".$name . $this->faker->randomDigit(),
            'password' => bcrypt("0000000000"), // password
            'avatar' => "/imgs/avatars/".$this->faker->randomElement([1,2,3,4,5]).".png",
            'cover' => "/imgs/covers/cover.jpg",
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
