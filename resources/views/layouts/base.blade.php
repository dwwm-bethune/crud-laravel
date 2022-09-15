<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Nunito] bg-gray-800 text-gray-300">
    <header>
        <div class="max-w-6xl mx-auto px-3">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold py-6">
                    <a href="#">CRUD</a>
                </h1>

                <ul class="flex space-x-6">
                    <li>
                        <a class="border-b hover:border-gray-300 duration-300 pb-2 {{ request()->routeIs('home') ? 'border-gray-300' : 'border-transparent'}}" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li>
                        <a class="border-b hover:border-gray-300 duration-300 pb-2 {{ request()->routeIs('index') ? 'border-gray-300' : 'border-transparent'}}" href="#">Liste</a>
                    </li>
                    <li>
                        <a class="border-b hover:border-gray-300 duration-300 pb-2 {{ request()->routeIs('create') ? 'border-gray-300' : 'border-transparent'}}" href="#">Créer</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <p class="text-center">{{ config('app.name') }} - Copyright &copy; {{ now()->year }}.</p>
    </footer>
</body>
</html>
