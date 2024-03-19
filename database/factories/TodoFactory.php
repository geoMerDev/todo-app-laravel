<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'is_complete' => $this->faker->boolean,
            'created_by' => \App\Models\User::inRandomOrder()->first()->id,
            'assigned_to' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
