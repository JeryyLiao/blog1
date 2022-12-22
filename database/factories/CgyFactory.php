<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cgy>
 */
class CgyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return ['title' => $this->faker->realText(15),
            // 'subject' => $this->faker->realText(15),
            // 'enabled' => $this->faker->randomElement([true, false]),
            // 'enabled_at' => Carbon::createFromFormat('Y-m-d', $this->faker->date),
            'pic' => $this->faker->imageUrl($width = 640, $height = 480),
            'sort' => rand(1, 100),
        ];
    }
}