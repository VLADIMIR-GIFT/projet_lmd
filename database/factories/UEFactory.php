<?php

namespace Database\Factories;

use App\Models\UE;
use Illuminate\Database\Eloquent\Factories\Factory;

class UEFactory extends Factory
{
    protected $model = UE::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word,  // Exemple pour générer un code unique
            'nom' => $this->faker->word,  // Exemple pour générer un nom d'UE
            'credits_ects' => $this->faker->numberBetween(1, 30),  // Crédits entre 1 et 30
            'semestre' => $this->faker->numberBetween(1, 2),  // Semestre 1 ou 2
        ];
    }
}
