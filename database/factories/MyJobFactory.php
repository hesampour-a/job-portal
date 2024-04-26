<?php

namespace Database\Factories;

use App\Models\myJob;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\myJob>
 */
class MyJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraphs(3, true),
            'salary' => fake()->numberBetween(7_000_000, 100_000_000),
            'location' => fake()->city,
            'category' => fake()->randomElement(myJob::$category),
            'experience' => fake()->randomElement(myJob::$experience)
        ];
    }
}
