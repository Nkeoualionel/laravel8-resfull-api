<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name" => $this->faker->word(),
            "description" => $this->faker->paragraph(1),
            "quantity" => $this->faker->randomNumber(1, 10),
            "image" => $this->faker->randomNumber(['img_1', 'img_2', 'img_3']),
            "status" => $this->faker->randomNumber([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
            "seller_id" => User::all()->random()->id,
            "buyer_id" => User::all()->random()->id,

        ];
    }
}
