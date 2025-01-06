<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    protected $model = Etudiant::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'numero_etudiant' => $this->faker->unique()->numerify('#########'),
            'niveau' => $this->faker->randomElement(['L1', 'L2', 'L3', 'M1', 'M2']),
        ];
    }
}
