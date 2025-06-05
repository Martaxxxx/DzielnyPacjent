<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow py-4">
    <div class="w-full flex items-center justify-between px-4 sm:px-10">
        <!-- Logo maksymalnie z lewej -->
        <div>
            <a href="{{ url('/') }}" class="text-2xl font-extrabold text-indigo-600 hover:text-indigo-800">
                🐾 Dzielny Pacjent
            </a>
        </div>

        <!-- Środek: linki nawigacyjne -->
        <div class="hidden md:flex flex-1 justify-center space-x-10 text-[17px] font-medium">
            @auth
                @if (in_array(Auth::user()->role, ['recepcja', 'admin']))
                    <a href="{{ route('pacjenci.index') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Pacjenci</a>
                    <a href="{{ route('wizyty.umow') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Umów wizytę</a>
                @endif

                @if (in_array(Auth::user()->role, ['weterynarz', 'admin']))
                    <a href="{{ route('vet.wizyty') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Panel Weterynarza</a>
                @endif

                @if (Auth::user()->role === 'pacjent')
                    <a href="{{ route('wizyty.umow') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Umów wizytę</a>
                @endif

                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.index') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Panel Admina</a>
                @endif
            @endauth
        </div>

        <!-- Prawa: użytkownik + Wyloguj -->
        <div class="hidden md:flex items-center gap-6 text-base font-medium ml-auto">
            @auth
                <span class="text-gray-600 dark:text-white">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-[#cb6ce6] hover:underline transition">Wyloguj</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Zaloguj się</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Zarejestruj się</a>
            @endauth
        </div>

        <!-- Burger (tylko mobile) -->
        <button @click="open = !open" class="md:hidden text-[#cb6ce6] focus:outline-none ml-4">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobilne menu -->
    <div x-show="open" class="md:hidden px-4 mt-4 flex flex-col gap-4 text-base font-medium">
        @auth
            @if (in_array(Auth::user()->role, ['recepcja', 'admin']))
                <a href="{{ route('pacjenci.index') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Pacjenci</a>
                <a href="{{ route('wizyty.umow') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Umów wizytę</a>
            @endif

            @if (in_array(Auth::user()->role, ['weterynarz', 'admin']))
                <a href="{{ route('vet.wizyty') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Panel Weterynarza</a>
            @endif

            @if (Auth::user()->role === 'pacjent')
                <a href="{{ route('wizyty.umow') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Umów wizytę</a>
            @endif

            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.index') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Panel Admina</a>
            @endif

            <span class="text-gray-600 dark:text-white">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-[#cb6ce6] hover:underline transition">Wyloguj</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Zaloguj się</a>
            <a href="{{ route('register') }}" class="text-gray-700 hover:text-[#cb6ce6] transition">Zarejestruj się</a>
        @endauth
    </div>
</nav>
