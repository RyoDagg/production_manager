<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name'=>$this->faker->word,
            'photo'=>$this->faker->image,
            'description'=>$this->faker->paragraph,
            'stock'=>$this->faker->numerify                ];
    }
}
