@extends('layouts.app')

@section('content')
    <h1>Liste des UEs</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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

    <a href="{{ route('ues.create') }}">Ajouter une nouvelle UE</a>
@endsection
