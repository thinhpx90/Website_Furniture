<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_no' => rand(1000000000000, 9999999999999),
            'customer_id' => \App\Models\User::inRandomOrder()->first()->id,
            'payment' => rand(1, 3),
            'status' => rand(-1, 1),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
