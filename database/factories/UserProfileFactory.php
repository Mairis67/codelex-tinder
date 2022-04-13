<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(18, 100),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'description' => $this->faker->sentence()
        ];
    }
}
