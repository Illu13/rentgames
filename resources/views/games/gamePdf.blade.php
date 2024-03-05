<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Alquiler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Detalle de Alquiler</h1>
    <p><strong>Desarrolladora:</strong> {{ $game->user->name }}</p>
    <p><strong>Título del Juego:</strong> {{ $game->name }}</p>
    <p><strong>Precio:</strong> {{ $game->rental_price }} €</p>
    <p><strong>Descripción:</strong> {{ $game->description }}</p>
    <img src="{{asset($game->photo) }}" alt="Foto del Juego">
    <p><strong>Fecha de Alquiler:</strong> {{ date('Y-m-d') }}</p>
</div>
</body>
</html>
