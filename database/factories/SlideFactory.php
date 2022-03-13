<?php

namespace Database\Factories;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slide::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'link' => $this->faker->url,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->realText(200, 2),
            'status' => 1,
        ];
    }
}
