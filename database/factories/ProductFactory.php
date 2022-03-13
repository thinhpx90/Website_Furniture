<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\TypeProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type_product = TypeProduct::all()->pluck('id')->toArray();
        $category = Category::all()->pluck('id')->toArray();
        $supplier = Supplier::all()->pluck('id')->toArray();
        $name = $this->faker->sentence($nbWords = 3, $variableNbWords = true);
        return [
            'name' => $name,
            'type_product_id' => $this->faker->randomElement($type_product),
            'category_id' => $this->faker->randomElement($category),
            'supplier_id' => $this->faker->randomElement($supplier),
            'description' => $this->faker->realText(200, 2),
            'slug' => Str::slug($name),
            'origin' => $this->faker->country,
            'material' => $this->faker->sentence(6, true),
            'size' => $this->faker->sentence(6, true),
            'unit_price' => $this->faker->numberBetween(100000, 9000000),
            'promotion_price' => 0,
            'unit' => $this->faker->word,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
