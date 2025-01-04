<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EC;
use App\Models\UE;

class ECController extends Controller
{
    // Afficher la liste des ECs
    public function index()
{
    $ecs = EC::with('ue')->get();
    return view('ecs.index', compact('ecs'));
}


    // Afficher le formulaire pour créer un nouvel EC
    public function create()
    {
        $ues = UE::all(); // Pour afficher les UEs disponibles dans un dropdown
        return view('ecs.create', compact('ues'));
    }

    // Enregistrer un nouvel EC
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'code' => 'required|unique:ecs|max:255',
            'nom' => 'required|max:255',
            'coefficient' => 'required|integer',
            'enseignant' => 'nullable|max:255', // Changez en nullable si vous voulez accepter des valeurs vides
            'ue_id' => 'required|exists:u_e_s,id',
        ]);

        // Assigner 'Inconnu' si l'enseignant est vide
        if (empty($request->enseignant)) {
            $request->merge(['enseignant' => 'Inconnu']);
        }

        // Création de l'enregistrement
        EC::create($request->all());

        return redirect()->route('ecs.index')->with('success', 'EC créé avec succès.');
    }

    // Afficher un EC spécifique
    public function show($id)
    {
        $e_c_s = EC::findOrFail($id);
        return view('ecs.show', compact('e_c_s'));
    }


    // Afficher le formulaire pour modifier un EC
    public function edit($id)
    {
        $e_c_s = EC::findOrFail($id);
        $ues = UE::all(); // Pour modifier l'UE associée
        return view('ecs.edit', compact('e_c_s', 'ues'));
    }

    // Mettre à jour un EC
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'code' => 'required|max:255|unique:ecs,code,' . $id,
            'nom' => 'required|max:255',
            'coefficient' => 'required|integer',
            'enseignant' => 'nullable|max:255', // Changez en nullable si vous voulez accepter des valeurs vides
            'ue_id' => 'required|exists:u_e_s,id',
        ]);

        // Vérifier et assigner 'Inconnu' si l'enseignant est vide
        if (empty($request->enseignant)) {
            $request->merge(['enseignant' => 'Inconnu']);
        }

        // Trouver l'EC à mettre à jour
        $ecs = EC::findOrFail($id);
        $ecs->update($request->all());

        return redirect()->route('ecs.index')->with('success', 'EC mis à jour avec succès.');
    }

    // Supprimer un EC
    public function destroy($id)
    {
        $e_c_s = EC::findOrFail($id);
        $e_c_s->delete();

        return redirect()->route('ecs.index')->with('success', 'EC supprimé avec succès.');
    }
}
