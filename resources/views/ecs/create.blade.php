@extends('layouts.app')

@section('content')

<style>
    h1 {
        font-family: serif;
    }

    .group {
        margin-bottom: 15px;
    }

    .group label {
        display: flex;
        margin-bottom: 5px;
        margin-left: 5px;
        font-size: 14px;
        color: #555555;
    }

    .group input, select {
        width: 50%;
        padding: 10px;
        margin-left: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        color: #333;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .group input:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        outline: none;
    }

    .group input:hover {
        background-color: #96a092;
    }

    .btn {
        display: block;
        width: 50%;
        margin-left: 20px;
        padding: 10px;
        font-size: 16px;
        color: #fff;
        background: #4a90e2;
        border: none;
         border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn:hover {
        background: #357ab8;
    }
</style>
<h1>Créer un nouvel EC</h1>

<form action="{{ route('ecs.store') }}" method="POST">
    @csrf
    <div class="group">
        <label for="code">Code :</label>
        <input type="text" name="code" id="code" required>
    </div>

    <div class="group">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
    </div>

    <div class="group">
        <label for="coefficient">Coefficient :</label>
        <input type="number" name="coefficient" id="coefficient" required>
    </div>

    <div class="group">
        <label for="enseignant">Enseignant :</label>
        <input type="text" name="enseignant" id="enseignant" required>
    </div>

    <div class="group">
        <label for="ue_id">UE associée :</label>
        <select name="ue_id" id="ue_id" required>
            @foreach ($ues as $ue)
            <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn" type="submit">Enregistrer</button>
</form>
@endsection
