<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue sur Laravel</h1>
    <p>Choisissez une option ci-dessous :</p>
    <ul>
        <li><a href="{{ url('/ues') }}">Gérer les UEs</a></li>
        <li><a href="{{ url('/ecs') }}">Gérer les ECs</a></li>
    </ul>
</body>
</html>
