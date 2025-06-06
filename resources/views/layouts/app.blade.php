<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ theme: localStorage.theme || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') }"
      x-init="
        if(theme === 'dark'){
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
        $watch('theme', value => {
          localStorage.theme = value;
          document.documentElement.classList.toggle('dark', value === 'dark');
        });
      "
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dzielny Pacjent') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">

    <!-- Nawigacja -->
    @include('layouts.navigation')

    <!-- Główna zawartość -->
    <main class="p-4">

        @if (session('success'))
            <div class="max-w-2xl mx-auto bg-green-100 border border-green-400 text-green-800 px-6 py-3 rounded shadow text-center mt-4">
                 {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
