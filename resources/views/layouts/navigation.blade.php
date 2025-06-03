<nav class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow px-10 py-4 flex justify-between items-center">
    <!-- Logo -->
    <div>
        <a href="{{ url('/') }}" class="text-2xl font-extrabold text-indigo-600 hover:text-indigo-800 flex items-center gap-2">
            🐾 Dzielny Pacjent
        </a>
    </div>

    <!-- Menu -->
    <div class="flex items-center gap-6 text-sm">
        @auth
            <!-- DARK MODE TOGGLE -->
            <button id="theme-toggle" class="text-gray-700 hover:text-indigo-600 transition text-xl" title="Zmień tryb">
                🌙
            </button>

            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 transition">Strona Główna</a>

            @if (Auth::user()->role === 'recepcja' || Auth::user()->role === 'weterynarz')
                <a href="{{ route('pacjenci.index') }}" class="text-gray-700 hover:text-indigo-600 transition">Pacjenci</a>
            @endif

            <a href="{{ route('wizyty.umow') }}" class="text-gray-700 hover:text-indigo-600 transition">Umów wizytę</a>

            @if (Auth::user()->role === 'weterynarz')
                <a href="{{ route('vet.wizyty') }}" class="text-gray-700 hover:text-indigo-600 transition">Panel Weterynarza</a>
            @endif

            <span class="text-gray-600 dark:text-white font-medium">
                {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button class="text-red-600 hover:underline">Wyloguj</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 transition">Zaloguj się</a>
            <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600 transition">Zarejestruj się</a>
        @endauth
    </div>
</nav>
