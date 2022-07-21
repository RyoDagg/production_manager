<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo'=>$this->faker->image,
            'name'=>$this->faker->name,
            'cin'=>$this->faker->numerify,
            'email'=>$this->faker->email,
            'adresse'=>$this->faker->address,
            'tel'=>$this->faker->numerify,

        ];
    }
}
