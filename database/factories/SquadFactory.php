<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Squad;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Squad>
 */
class SquadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teammanager' => $this->faker->name(),
            'reviewsofsquad' => $this->faker->sentence(),
        ];
    }
}
