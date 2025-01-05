@extends('layouts.app')

@section('content')
    <h1>Modifier l'UE : {{ $ue->nom }}</h1>

    <form action="{{ route('ues.update', $ue->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="code">Code</label>
        <input type="text" id="code" name="code" value="{{ old('code', $ue->code) }}" required>
    </div>

    <div>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="{{ old('nom', $ue->nom) }}" required>
    </div>

    <div>
        <label for="credits_ects">Crédits ECTS</label>
        <input type="number" id="credits_ects" name="credits_ects" value="{{ old('credits_ects', $ue->credits_ects) }}" required>
    </div>

    <div>
        <label for="semestre">Semestre</label>
        <input type="number" id="semestre" name="semestre" value="{{ old('semestre', $ue->semestre) }}" required>
    </div>

    <button type="submit">Mettre à jour l'UE</button>
</form>

@endsection
