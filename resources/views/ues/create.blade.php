<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer ou Mettre à jour une UE</title>
</head>
<body>

    <h1>Créer une nouvelle Unité d'Enseignement</h1>

    <!-- Formulaire de création -->
    <form action="{{ route('ues.store') }}" method="POST">
        @csrf
        <div>
            <label for="code">Code de l'UE</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" required>
        </div>

        <div>
            <label for="nom">Nom de l'UE</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div>
            <label for="credits_ects">Crédits ECTS</label>
            <input type="number" id="credits_ects" name="credits_ects" value="{{ old('credits_ects') }}" required>
        </div>

        <div>
            <label for="semestre">Semestre</label>
            <input type="text" id="semestre" name="semestre" value="{{ old('semestre') }}" required>
        </div>

        <button type="submit">Enregistrer</button>
    </form>

    @if(isset($ue))
        <h1>Mettre à jour l'Unité d'Enseignement</h1>

        <!-- Formulaire de mise à jour -->
        <form action="{{ route('ues.update', $ue->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="code">Code de l'UE</label>
                <input type="text" id="code" name="code" value="{{ old('code', $ue->code) }}" required>
            </div>

            <div>
                <label for="nom">Nom de l'UE</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $ue->nom) }}" required>
            </div>

            <div>
                <label for="credits_ects">Crédits ECTS</label>
                <input type="number" id="credits_ects" name="credits_ects" value="{{ old('credits_ects', $ue->credits_ects) }}" required>
            </div>

            <div>
                <label for="semestre">Semestre</label>
                <input type="text" id="semestre" name="semestre" value="{{ old('semestre', $ue->semestre) }}" required>
            </div>

            <button type="submit">Mettre à jour</button>
        </form>
    @endif

</body>
</html>
