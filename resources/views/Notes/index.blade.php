@extends('layouts.app')

@section('content')
<h1>Liste des Notes</h1>
<a href="{{ route('notes.create') }}">Ajouter une nouvelle note</a>
<table>
   <thead>
       <tr>
           <th>Étudiant</th>
           <th>Note</th>
           <th>Date d'évaluation</th>
       </tr>
   </thead>
   <tbody>
       @foreach($notes as $note)
           <tr>
               <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
               <td>{{ $note->note }}</td>
               <td>{{ $note->date_evaluation }}</td>
           </tr>
       @endforeach
   </tbody>
</table>
@endsection
