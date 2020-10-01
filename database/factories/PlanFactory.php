<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stripe_plan' => 'price_'.$this->faker->lexify('??????????????'),
            'product_id' => Product::factory(),
            'time_frame' => 'monthly',
            'price' => $this->faker->numberBetween(1000,5000),
        ];
    }
}
