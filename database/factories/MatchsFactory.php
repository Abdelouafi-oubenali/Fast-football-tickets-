<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matchs>
 */
class MatchsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'time' =>$this->faker->time(),
            'stadium' => $this->faker->city,
            'home_team_id' => 28,
            'away_team_id' => 25,
        ];
    }
}
