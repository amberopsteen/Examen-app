<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
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
            'description' => $this->faker->paragraph,
            'start_datetime' => $this->faker->dateTimeBetween('2024-01-01', '2024-6-31'),
            'end_datetime' => $this->faker->dateTimeBetween('2024-06-01', '2024-12-31'),
        ];
    }
}
