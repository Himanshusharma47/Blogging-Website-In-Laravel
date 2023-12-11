<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->pluck('id')->toArray();
        $category = Category::all()->pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence,
            'post' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'user_id' => $this->faker->randomElement($user),
            'category_id' => $this->faker->randomElement($category),
         ];
    }
}
