<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'unit_id'=>Unit::factory(),
            'photo'=>$this->faker->image,
            'description'=>$this->faker->paragraph,
            'stock'=>$this->faker->numerify                ];
    }
}
