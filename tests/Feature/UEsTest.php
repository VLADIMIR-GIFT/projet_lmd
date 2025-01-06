<?php
namespace Tests\Feature;

use App\Models\UE;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UEsTest extends TestCase
{
    use RefreshDatabase; // Restaure la base de données après chaque test

    // Test pour la création d'une UE
    public function test_create_ue()
    {
        // Créer un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user);

        // Envoi de la requête pour créer une UE
        $response = $this->post('/ues', [
            'code' => 'UE101',
            'nom' => 'Mathematics',
            'credits_ects' => 6,
            'semestre' => 1,
        ]);

        // Vérifie que l'UE a bien été créée dans la base de données
        $this->assertDatabaseHas('u_e_s', [
            'code' => 'UE101',
            'nom' => 'Mathematics',
            'credits_ects' => 6,
            'semestre' => 1,
        ]);

        // Vérifie qu'on redirige correctement après la création
        $response->assertRedirect(route('ues.index'));
    }

    // Test pour l'affichage de la liste des UEs
    public function test_index_ues()
    {
        // Créer une UE pour qu'elle soit affichée
        UE::factory()->create([
            'code' => 'UE102',
            'nom' => 'Physics',
            'credits_ects' => 5,
            'semestre' => '2',
        ]);

        // Envoi d'une requête GET pour récupérer la liste des UEs
        $response = $this->get('/ues');

        // Vérifie que la réponse contient l'UE précédemment créée
        $response->assertSee('Physics');
        $response->assertSee('UE102');
    }

    // Test pour l'affichage des détails d'une UE
    public function test_show_ue()
    {
        // Créer une UE
        $ue = UE::factory()->create([
            'code' => 'UE103',
            'nom' => 'Chemistry',
            'credits_ects' => 4,
            'semestre' => '1',
        ]);

        // Envoi d'une requête GET pour afficher l'UE
        $response = $this->get(route('ues.show', $ue->id));

        // Vérifie que la réponse contient les détails de l'UE
        $response->assertSee('Chemistry');
        $response->assertSee('UE103');
    }

    // Test pour la mise à jour d'une UE
    public function test_update_ue()
    {
        // Créer une UE
        $ue = UE::factory()->create([
            'code' => 'UE104',
            'nom' => 'Biology',
            'credits_ects' => 5,
            'semestre' => '2',
        ]);

        // Créer un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user);

        // Envoi d'une requête PUT pour mettre à jour l'UE
        $response = $this->put(route('ues.update', $ue->id), [
            'code' => 'UE105',
            'nom' => 'Biology Advanced',
            'credits_ects' => 6,
            'semestre' => '2',
        ]);

        // Vérifie que l'UE a bien été mise à jour dans la base de données
        $this->assertDatabaseHas('u_e_s', [
            'code' => 'UE105',
            'nom' => 'Biology Advanced',
            'credits_ects' => 6,
            'semestre' => '2',
        ]);

        // Vérifie la redirection après la mise à jour
        $response->assertRedirect(route('ues.index'));
    }

    // Test pour la suppression d'une UE
    public function test_delete_ue()
    {
        // Créer une UE à supprimer
        $ue = UE::factory()->create([
            'code' => 'UE106',
            'nom' => 'History',
            'credits_ects' => 3,
            'semestre' => '1',
        ]);

        // Créer un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user);

        // Envoi d'une requête DELETE pour supprimer l'UE
        $response = $this->delete(route('ues.destroy', $ue->id));

        // Vérifie que l'UE a bien été supprimée de la base de données
        $this->assertDatabaseMissing('u_e_s', [
            'code' => 'UE106',
            'nom' => 'History',
        ]);

        // Vérifie la redirection après la suppression
        $response->assertRedirect(route('ues.index'));
    }

    // Test pour vérifier que le champ credits_ects est obligatoire
    public function test_create_ue_with_invalid_data()
    {
        // Créer un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user);

        // Essayer de créer une UE avec des données invalides (credits_ects manquant)
        $response = $this->post('/ues', [
            'code' => 'UE107',
            'nom' => 'Geography',
            'credits_ects' => '',  // Crédit ECTS vide
            'semestre' => '3',
        ]);

        // Vérifie que la requête échoue et revient avec des erreurs
        $response->assertSessionHasErrors('credits_ects');
    }
}
