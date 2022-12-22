<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\items>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realtext(20),
            'pic' => $this->faker->imageUrl($width = 640, $height = 480),
            'price' => rand(15, 9999),
            'enabled' => $this->faker->randomElement([true, false]),
            'desc' => $this->faker->text(150),
            'enabled_at' => Carbon::now()->addDays(rand(1, 30)),
            'cgy_id' => rand(1, 200),
            //
        ];
    }
}