<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * Defaults to creating a new user and category automatically.
     * Override in tests with specific IDs:
     *   Skill::factory()->create(['user_id' => $user->id, 'category_id' => $cat->id])
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Name of the skill (e.g. "Laravel", "Figma")
            'name' => $this->faker->word(),

            // Mastery level from 0 (beginner) to 100 (expert)
            'percent' => $this->faker->numberBetween(0, 100),

            // Owner of the skill — tests should override with their own user.
            'user_id' => User::factory(),

            // Category this skill belongs to — tests should override with their own category.
            'category_id' => Category::factory(),

            // Optional image path; null by default.
            'image' => null,
        ];
    }
}
