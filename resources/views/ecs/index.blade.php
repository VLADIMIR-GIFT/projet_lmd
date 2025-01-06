@extends('layouts.app')
<style>
    .container {
  max-width: 800px;
  margin: 50px auto;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
  font-size: 16px;
  color: #333;
}

thead th {
  background: #4a719e;
  color: #fff;
  text-align: left;
  padding: 10px;
}

tbody td {
  padding: 10px;
  border-bottom: 1px solid #000000;
}

tbody tr:hover {
  background: #bac8d4;
  transition: background 0.3s;
}

td,
th {
  text-align: justify;
}

th,
td {
  border: 1px solid #000000;
}

</style>
@section('content')

<h1>Liste des ECs</h1>
<div>
    <a href="{{ route('ecs.create') }}" class="btn btn-primary">Ajouter un nouvel EC</a>
</div>

<div class="container">
<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Coefficient</th>
            <th>Enseignant</th>
            <th>UE associée</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ecs as $ec)
        <tr>
            <td>{{ $ec->code }}</td>
            <td>{{ $ec->nom }}</td>
            <td>{{ $ec->coefficient }}</td>
            <td>{{ $ec->enseignant }}</td>
            <td>{{ $ec->ue->nom }}</td>
            <td>
                <a href="{{ route('ecs.edit', $ec->id) }}">Modifier</a>
                <form action="{{ route('ecs.destroy', $ec->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
