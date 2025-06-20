<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->sentence(3),
            'category_id' => rand(1, 5),  // Assuming you have some categories already
            'description' => $this->faker->paragraph,
            'image' => 'courses/dummy' . rand(1,5) . '.jpg',  // Assuming you have 5 dummy images uploaded
            'price' => $this->faker->numberBetween(500, 5000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
