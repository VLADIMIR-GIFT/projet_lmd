<?php
// Database\Factories\ECFactory.php
namespace Database\Factories;

use App\Models\EC;
use App\Models\UE;
use Illuminate\Database\Eloquent\Factories\Factory;

class ECFactory extends Factory
{
    protected $model = EC::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word,
            'nom' => $this->faker->word,
            'coefficient' => $this->faker->numberBetween(1, 5),
            'enseignant' => 'Prof. ' . $this->faker->lastName, // Utilisation d'un enseignant contrôlé
            'ue_id' => UE::factory(), // Associe une UE à l'EC
        ];
    }
}
