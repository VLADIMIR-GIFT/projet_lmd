<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet_TDD</title>
</head>

<style>

    body {
            background: linear-gradient(135deg, #74ebd5, #9face6);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
    }
    h1 {
        display: flex;
        justify-content: center;
        padding: 10px 0 0 0;
    }

    p {
        font-family: sans-serif;
        padding-left: 10px; 
    }

    a {
            text-decoration: none;
            color: #19242a;
            font-weight: bold;
            padding: 10px 20px;
            position: relative;
            display: inline-block;
            border: 2px solid transparent;
            transition: color 0.3s ease;
    }
        a:hover {
            color: #3a1f1c;
       }

        a:hover::before {
            width: 100%;
            height: 100%;
            opacity: 1;
    }
        a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            transition: width 0.4s ease, height 0.4s ease, opacity 0.3s ease;
            opacity: 0;
    }
        a:active {
            color: #fff;
            transform: scale(0.98);
    }

        a:active::before {
            background: rgba(231, 76, 60, 0.6);
            width: 100%;
            height: 100%;
    }

</style>

<body>
    <h1>Bienvenue sur Laravel</h1>
    <p>Choisissez une option ci-dessous :</p>
    <ul>
        <li><a href="{{ url('/ues') }}">Gérer les UEs</a></li>
        <li><a href="{{ url('/ecs') }}">Gérer les ECs</a></li>
    </ul>
</body>
</html>
