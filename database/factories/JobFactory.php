<?php

namespace Database\Factories;

use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(2, true),
            'job_category_id' => JobCategory::factory(),
            'description' => $this->faker->words(2, true),
            'location' => $this->faker->words(2, true),
            'requirements' => $this->faker->words(2, true),   
        ];
    }
}
