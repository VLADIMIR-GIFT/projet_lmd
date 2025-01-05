<?php
namespace App\Http\Controllers;

use App\Models\UE; // Assurez-vous que c'est UE et non UES
use Illuminate\Http\Request;

class UESController extends Controller
{
    public function create()
    {
        // Retourne la vue pour créer une unité d'enseignement (UE)
        return view('ues.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'code' => 'required|unique:unites_enseignement,code',
            'nom' => 'required',
            'credits_ects' => 'required|integer',
            'semestre' => 'required|integer',
        ]);

        // Création de l'UE
        UE::create($validatedData);  // Utilisation correcte du modèle UE

        // Rediriger vers la liste des UEs
        return redirect()->route('ues.index');
    }
}
