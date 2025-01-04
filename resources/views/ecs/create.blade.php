@extends('layouts.app')

@section('content')
<h1>Créer un nouvel EC</h1>

<form action="{{ route('ecs.store') }}" method="POST">
    @csrf
    <div>
        <label for="code">Code :</label>
        <input type="text" name="code" id="code" required>
    </div>
    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
    </div>
    <div>
        <label for="coefficient">Coefficient :</label>
        <input type="number" name="coefficient" id="coefficient" required>
    </div>
    <div>
        <label for="enseignant">Enseignant :</label>
        <input type="text" name="enseignant" id="enseignant" required>
    </div>
    <div>
        <label for="ue_id">UE associée :</label>
        <select name="ue_id" id="ue_id" required>
            @foreach ($ues as $ue)
            <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Enregistrer</button>
</form>
@endsection
