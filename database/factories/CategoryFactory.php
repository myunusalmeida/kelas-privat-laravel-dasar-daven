<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryName = $this->faker->words(2, true); // Generates a random category name

        return [
            'category_name' => $categoryName,
            'slug' => Str::slug($categoryName), // Sepeda Motor = sepeda-motor https://yunus.com/sepeda-motor
            'image' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'), // Generates a random image URL
            'description' => $this->faker->paragraph, // Generates a random paragraph
            'status' => $this->faker->randomElement(['Aktif', 'Non-Aktif']), // Randomly selects 'Aktif' or 'Non-Aktif'
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
