<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tax'=>$this->faker->numerify,
            'discount'=>$this->faker->numerify,
            'client_id'=>Sale::factory(),
            'fournisseur_id'=>Fournisseur::factory(),
        ];
    }
}
