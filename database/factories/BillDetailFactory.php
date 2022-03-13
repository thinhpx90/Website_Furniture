<?php

namespace Database\Factories;

use App\Models\BillDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BillDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = \App\Models\Product::inRandomOrder()->first();
        $bill = \App\Models\Product::inRandomOrder()->first();
        return [
            'bill_id' => $bill->id,
            'product_id' => $product->id,
            'quantity' => rand(1, 3),
            'unit_price' => $product->unit_price,
            'created_at' => $bill->created_at,
        ];
    }
}
