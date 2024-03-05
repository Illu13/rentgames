<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/eac34a33f0.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen background">
            @include('layouts.navigation')
            @if(session()->has('message'))
            <x-adminalert :message=" session('message') "></x-adminalert>
            @endif
            @if(session()->has('correct'))
            <x-addedgamealert :message=" session('correct') " :game=" session('game') "></x-addedgamealert>
            @endif
            <!-- Page Heading -->

            <!-- Page Content -->
            <main>

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
