<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileSettingsFactory extends Factory
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
            'search_male' => $this->faker->numberBetween(0, 1),
            'search_female' => $this->faker->numberBetween(0, 1),
        ];
    }
}
