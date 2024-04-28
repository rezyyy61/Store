<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 10),
            'categories_id' => $this->faker->numberBetween(1, 10),
            'path' => $this->faker->imageUrl(), // You can use faker to generate a fake image URL
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
