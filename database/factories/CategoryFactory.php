<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * user_id is set to a newly created user by default.
     * Override in tests with: Category::factory()->create(['user_id' => $user->id])
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            // Default to a real user; tests should pass their own user_id.
            'user_id' => User::factory(),
        ];
    }
}
