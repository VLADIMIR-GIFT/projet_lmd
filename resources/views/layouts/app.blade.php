<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application')</title>
    <!-- Vous pouvez ajouter ici vos fichiers CSS -->
</head>
<body>

    <header>
        <h1>Mon Application Laravel</h1>
    </header>

    <nav>
        <!-- Votre barre de navigation -->
    </nav>

    <main>
        <!-- Contenu de la page spécifique -->
        @yield('content')
    </main>

    <footer>
        <!-- Footer -->
    </footer>

</body>
</html>
