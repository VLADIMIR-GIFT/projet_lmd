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
    <h1>Liste des UEs</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div>
        <a href="{{ route('ues.create') }}">Ajouter une nouvelle UE</a>
    </div>
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>Code UE</th>
                <th>Nom</th>
                <th>ECTS</th>
                <th>Semestre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($u_e_s as $ue)
                <tr>
                    <td>{{ $ue->code }}</td>
                    <td>{{ $ue->nom }}</td>
                    <td>{{ $ue->credits_ects }}</td>
                    <td>S{{ $ue->semestre }}</td>
                    <td>
                        <!-- Lien pour voir l'UE -->
                        <a href="{{ route('ues.show', $ue->id) }}">Voir</a>
                        <!-- Lien pour modifier l'UE -->
                        <a href="{{ route('ues.edit', $ue->id) }}">Modifier</a>
                        <!-- Formulaire pour supprimer l'UE -->
                        <form action="{{ route('ues.destroy', $ue->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette UE ?');">
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
