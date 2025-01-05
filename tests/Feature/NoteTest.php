<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Etudiant;
use App\Models\Note;
use App\Models\ElementConstitutif;
use App\Models\UniteEnseignement;
use Illuminate\Foundation\Testing\RefreshDatabase;



class NoteTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_ajout_dune_note_valide()
    {
        
        $etudiant = Etudiant::factory()->create();

        
        $note = Note::create([
            'etudiant_id' => $etudiant->id,
            'note' => 15,
            'date_evaluation' => now(),
        ]);

        
        $this->assertDatabaseHas('notes', [
            'id' => $note->id,
            'note' => 15,
            'etudiant_id' => $etudiant->id,
        ]);
    }

    #[Test]
    public function test_verification_des_limites()
    {
        
        $etudiant = Etudiant::factory()->create();

        
        $this->expectException(\Illuminate\Database\QueryException::class);

    
    Note::create([
        'etudiant_id' => 1,
        'note' => 21, 
        'ec_id' => 1, 
        'date_evaluation' => now(),

    ]);
    }

    #[Test]
    public function test_calcul_de_la_moyenne_dune_ue()
    {
         
        $etudiant = Etudiant::factory()->create();
        
        Note::create(['etudiant_id' => $etudiant->id, 'note' => 10, 'date_evaluation' => now()]);
        Note::create(['etudiant_id' => $etudiant->id, 'note' => 15, 'date_evaluation' => now()]);

        
        $average = Note::where('etudiant_id', $etudiant->id)->avg('note');

        
        $this->assertEquals(12.5, round($average, 2));
    }

    #[Test]
    public function test_gestion_des_sessions()
    {
        
        $etudiant = Etudiant::factory()->create();

        
        Note::create([
            'etudiant_id' => $etudiant->id,
            'note' => 18,
            'date_evaluation' => now(),
            'session' => 'normale',
        ]);

        Note::create([
            'etudiant_id' => $etudiant->id,
            'note' => 12,
            'date_evaluation' => now(),
            'session' => 'rattrapage',
        ]);

        
        $this->assertDatabaseCount('notes', 2);
        
        
        $this->assertDatabaseHas('notes', [
            'etudiant_id' => $etudiant->id,
            'note' => 18,
            'session' => 'normale',
        ]);
        
        $this->assertDatabaseHas('notes', [
            'etudiant_id' => $etudiant->id,
            'note' => 12,
            'session' => 'rattrapage',
        ]);
    }

    #[Test]
    public function test_validation_des_notes_manquantes()
    {
        
        $etudiant = Etudiant::factory()->create();

        
        $this->assertCount(0, Note::where('etudiant_id', $etudiant->id)->get());

        
        Note::create([
            'etudiant_id' => $etudiant->id,
            'note' => 14,
            'date_evaluation' => now(),
        ]);

        
        $this->assertCount(1, Note::where('etudiant_id', $etudiant->id)->get());
    }
}
