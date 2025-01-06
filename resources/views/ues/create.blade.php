<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer ou Mettre à jour une UE</title>
</head>



<style>
    h1 {
        font-family: monospace;
        padding-top: 20px;
    }

    body {
        background: linear-gradient(135deg, #74ebd5, #9face6);
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
        text-align: center;
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
        font-size: 100%;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
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

<body>

    <h1>Créer une nouvelle Unité d'Enseignement</h1>

    <!-- Formulaire de création -->
    <form action="{{ route('ues.store') }}" method="POST">
        @csrf
        <div class="group">
            <label for="code">Code de l'UE</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" required>
        </div>

        <div class="group">
            <label for="nom">Nom de l'UE</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="group">
            <label for="credits_ects">Crédits ECTS</label>
            <input type="number" id="credits_ects" name="credits_ects" value="{{ old('credits_ects') }}" required>
        </div>

        <div class="group">
            <label for="semestre">Semestre</label>
            <input type="text" id="semestre" name="semestre" value="{{ old('semestre') }}" required>
        </div>

        <button class="btn" type="submit">Enregistrer</button>
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
