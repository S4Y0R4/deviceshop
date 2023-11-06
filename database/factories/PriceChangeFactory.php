<?php

namespace Database\Factories;

use App\Models\PriceChange;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceChange>
 */
class PriceChangeFactory extends Factory
{
    protected $model = PriceChange::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_price_change'=>$this->faker->dateTimeBetween('-1 year', 'now'),
            'new_price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
