<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Product;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity'=>$this->faker->numerify,
            'client_id'=>Client::factory(),
            'product_id'=>Product::factory(),
            'prix_unit'=>$this->faker->numerify,
            'prix_tot'=>$this->faker->numerify,
            'status'=>$this->faker->randomElement(['pending','accepted','refused'])
        ];
    }
}
