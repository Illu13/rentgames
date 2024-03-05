<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403 - Acceso Prohibido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
<div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Error 403</h1>
    <p class="text-gray-700 mb-4">¡Acceso prohibido! No tienes permiso para acceder a esta página.</p>
    <a href="{{ route('dashboard') }}" class="text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded-md inline-block">Volver al inicio</a>
</div>
</body>
</html>
