@extends('layouts.app')

@section('content')
    <h1>Détails de l'UE : {{ $ue->nom }}</h1>
    <ul>
        <li><strong>Code : </strong>{{ $ue->code }}</li>
        <li><strong>Crédits ECTS : </strong>{{ $ue->credits_ects }}</li>
        <li><strong>Semestre : </strong>{{ $ue->semestre }}</li>
    </ul>
    <a href="{{ route('ues.index') }}">Retour à la liste des UEs</a>
@endsection
