<?php
namespace App\Http\Controllers;

use App\Models\UE;
use Illuminate\Http\Request;

class UEController extends Controller
{
    // Afficher la liste des UEs
    public function index()
    {
        $u_e_s = UE::all();  // Récupère toutes les UEs
        return view('ues.index', compact('u_e_s')); // Assurez-vous d'utiliser la même variable ici
    }

    // Afficher le formulaire pour créer une nouvelle UE
    public function create()
    {
        return view('ues.create');
    }

    // Enregistrer une nouvelle UE
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:unites_enseignement,code',
            'nom' => 'required',
            'credits_ects' => 'required|numeric',
            'semestre' => 'required|integer',
        ]);

        UE::create($request->all());  // Enregistre l'UE dans la base de données

        return redirect()->route('ues.index')->with('success', 'UE créée avec succès.');
    }

    // Afficher le formulaire pour modifier une UE existante
    public function edit($id)
    {
        $ue = UE::findOrFail($id); // Trouve l'UE par son ID
        return view('ues.edit', compact('ue')); // Passe l'UE à la vue
    }

    // Mettre à jour une UE
    public function update(Request $request, $id)
    {
        // Validation des données reçues
        $request->validate([
            'code' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'ects' => 'required|integer',
            'semestre' => 'required|integer',
        ], [
            'code.required' => 'Le code de l\'UE est obligatoire.',
            'nom.required' => 'Le nom de l\'UE est obligatoire.',
            'ects.required' => 'Le nombre d\'ECTS est obligatoire.',
            'semestre.required' => 'Le semestre est obligatoire.',
        ]);

        // Recherche de l'UE par son ID
        $ue = UE::findOrFail($id);

        // Mise à jour des informations de l'UE
        $ue->update([
            'code' => $request->input('code'),
            'nom' => $request->input('nom'),
            'ects' => $request->input('ects'),
            'semestre' => $request->input('semestre'),
        ]);

        // Redirection après mise à jour
        return redirect()->route('ues.index')->with('success', 'UE mise à jour avec succès.');
    }

    // Supprimer une UE
    public function destroy($id)
    {
        // Trouver l'UE à supprimer
        $ue = UE::findOrFail($id);

        // Supprimer l'UE
        $ue->delete();

        // Retourner à la liste des UEs avec un message de succès
        return redirect()->route('ues.index')->with('success', 'UE supprimée avec succès.');
    }

    public function show($id)
    {
        $ue = UE::findOrFail($id); // Trouve l'UE par son ID
        return view('ues.show', compact('ue')); // Passe l'UE à la vue
    }
}
