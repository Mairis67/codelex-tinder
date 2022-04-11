<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image(400,400);
        $imageName = explode('/',$image);
        $imageName = end($imageName);

        return [
            'user_id' => User::factory(),
            'path' => $imageName
        ];
    }
}
