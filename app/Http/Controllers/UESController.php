<?php

namespace App\Http\Controllers;

use App\Models\UES; // Ajouter l'importation du modèle UES
use Illuminate\Http\Request;

class UESController extends Controller
{
    public function create()
    {
        // Retourne la vue pour créer un u_e_s
        return view('ues.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'code' => 'required|unique:u_e_s,code',
            'nom' => 'required',
            'credits_ects' => 'required|integer',
            'semestre' => 'required',
        ]);

        // Création de l'UE dans la base de données
        UES::create([
            'code' => $request->code,
            'nom' => $request->nom,
            'credits_ects' => $request->credits_ects,
            'semestre' => $request->semestre,
        ]);

        // Rediriger après l'ajout
        return redirect()->route('ues.create')->with('success', 'UE créée avec succès');
    }
}
