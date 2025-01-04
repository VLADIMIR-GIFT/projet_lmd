@extends('layouts.app')

@section('content')
<h1>Modifier l'EC</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{ route('ecs.update', $e_c_s->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="code">Code :</label>
        <input type="text" name="code" id="code" value="{{ old('code', $e_c_s->code) }}" required>
    </div>
    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom', $e_c_s->nom) }}" required>
    </div>
    <div>
        <label for="coefficient">Coefficient :</label>
        <input type="number" name="coefficient" id="coefficient" value="{{ old('coefficient', $e_c_s->coefficient) }}" required>
    </div>
    <div>
        <label for="enseignant">Enseignant :</label>
        <input type="text" name="enseignant" id="enseignant" value="{{ old('enseignant', $e_c_s->enseignant) }}" required>
    </div>
    <div>
        <label for="ue_id">UE associée :</label>
        <select name="ue_id" id="ue_id" required>
            @foreach ($ues as $ue)
            <option value="{{ $ue->id }}" {{ $ue->id == $e_c_s->ue_id ? 'selected' : '' }}>
                {{ $ue->nom }}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Mettre à jour</button>
</form>
@endsection
