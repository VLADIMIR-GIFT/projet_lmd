<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UE;
use App\Models\EC;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ECsTest extends TestCase
{
        use RefreshDatabase;

        // Test de la création d'un EC
        public function test_create_ec()
        {
            // Créer une UE
            $ue = UE::factory()->create();

            // Créer un EC associé à l'UE
            $ec = EC::factory()->create([
                'ue_id' => $ue->id,
            ]);

            // Vérifie que l'EC est bien dans la base de données
            $this->assertDatabaseHas('ecs', [
                'code' => $ec->code,
                'nom' => $ec->nom,
                'coefficient' => $ec->coefficient,
                'enseignant' => $ec->enseignant,
                'ue_id' => $ue->id,
            ]);
        }

        // Test de la mise à jour d'un EC
        public function test_update_ec()
        {
            // Créer une UE
            $ue = UE::factory()->create();

            // Créer un EC
            $ec = EC::factory()->create([
                'ue_id' => $ue->id,
            ]);

            // Mettre à jour l'EC
            $ec->update([
                'code' => 'UpdatedCode',
                'nom' => 'Updated Name',
                'coefficient' => 4,
                'enseignant' => 'Updated Teacher',
            ]);

            // Vérifie que l'EC a bien été mis à jour dans la base de données
            $this->assertDatabaseHas('ecs', [
                'code' => 'UpdatedCode',
                'nom' => 'Updated Name',
                'coefficient' => 4,
                'enseignant' => 'Updated Teacher',
            ]);
        }

        // Test de la suppression d'un EC
        public function test_delete_ec()
        {
            // Créer une UE
            $ue = UE::factory()->create();

            // Créer un EC
            $ec = EC::factory()->create([
                'ue_id' => $ue->id,
            ]);

            // Supprimer l'EC
            $ec->delete();

            // Vérifie que l'EC a été supprimé de la base de données
            $this->assertDatabaseMissing('ecs', [
                'code' => $ec->code,
                'nom' => $ec->nom,
            ]);
        }

        // Test de validation de la relation avec UE
        public function test_ec_belongs_to_ue()
        {
            // Créer une UE
            $ue = UE::factory()->create();

            // Créer un EC associé à l'UE
            $ec = EC::factory()->create([
                'ue_id' => $ue->id,
            ]);

            // Vérifie que l'EC appartient bien à l'UE
            $this->assertTrue($ec->ue->is($ue));
        }
    }
