<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\ElementConstitutif;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create()
    {
        $etudiants = Etudiant::orderBy('nom')->get();
        $ecs = ElementConstitutif::with('uniteEnseignement')->get();
        return view('notes.create', compact('etudiants', 'ecs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:elements_constitutifs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
            'date_evaluation' => 'required|date',
        ]);

        Note::create($validated);
        return redirect()->back()->with('success', 'Note enregistrée avec succès');
    }

    public function show(Etudiant $etudiant)
    {
        $notes = Note::with(['elementConstitutif.uniteEnseignement'])
            ->where('etudiant_id', $etudiant->id)
            ->get()
            ->groupBy('elementConstitutif.uniteEnseignement.code');

        return view('notes.show', compact('etudiant', 'notes'));
    }
}

