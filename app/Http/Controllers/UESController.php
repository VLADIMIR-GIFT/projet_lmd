<?php
namespace App\Http\Controllers;

use App\Models\UE;
use Illuminate\Http\Request;

class UESController extends Controller
{
    public function create()
    {
        return view('ues.create');
    }

    public function edit($id)
    {
        $ue = UE::findOrFail($id);
        return view('ues.edit', compact('ue'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:unites_enseignement,code,' . $id,
            'nom' => 'required',
            'credits_ects' => 'required|integer',
            'semestre' => 'required|integer',
        ]);

        $ue = UE::findOrFail($id);
        $ue->update($validatedData);

        return redirect()->route('ues.index')->with('success', 'L\'UE a été mise à jour avec succès.');
    }

    public function index()
    {
        $u_e_s = UE::all();
        return view('ues.index', compact('u_e_s'));
    }

    public function destroy($id)
    {
        $ue = UE::findOrFail($id);
        $ue->delete();

        return redirect()->route('ues.index')->with('success', 'L\'UE a été supprimée avec succès.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:unites_enseignement,code',
            'nom' => 'required',
            'credits_ects' => 'required|integer',
            'semestre' => 'required|integer',
        ]);

        UE::create($validatedData);

        return redirect()->route('ues.index');
    }

    // Ajout de la méthode show
    public function show($id)
    {
        $ue = UE::findOrFail($id);
        return view('ues.show', compact('ue'));
    }
}
