<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fournisseur;
use App\Models\Materials;

class PurchaseFactory extends Factory
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
            'fournisseur_id'=>Fournisseur::factory(),
            'material_id'=>Materials::factory(),
            'prix_unit'=>$this->faker->numerify,
            'prix_tot'=>$this->faker->numerify,
            'status'=>$this->faker->name   
        ];
    }
}
