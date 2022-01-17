<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instagram' => $this->faker->userName,
            'github' => $this->faker->userName,
            'web' => $this->faker->url,
        ];
    }
}
