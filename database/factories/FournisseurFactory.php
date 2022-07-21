<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FournisseurFactory extends Factory
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
            'cin'=>$this->faker->numerify,
            'is_company'=>$this->faker->boolean,
            'email'=>$this->faker->email,
            'adresse'=>$this->faker->address,
            'tel'=>$this->faker->numerify
        ];
    }
}
