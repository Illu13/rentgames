<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 503 - Servicio no disponible</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
<div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-center mb-4">Error 503 - Servicio no disponible</h1>
    <p class="text-gray-700 text-center mb-6">Lo sentimos, el servicio no está disponible en este momento.</p>
    <p class="text-gray-700 text-center">Estamos experimentando una sobrecarga en el servidor o realizando tareas de mantenimiento. Por favor, inténtalo de nuevo más tarde.</p>
    <a href="{{ route('dashboard') }}" class="text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded-md inline-block">Volver al inicio</a>
</div>
</body>
</html>
