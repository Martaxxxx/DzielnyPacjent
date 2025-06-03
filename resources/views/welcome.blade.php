@extends('layouts.app')

@section('title', 'Strona Główna')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('/img/1.png');">
    <div class="text-center p-8 bg-white bg-opacity-80 rounded-xl shadow-lg">
        <h1 class="text-4xl font-bold">Witamy w Dzielnym Pacjencie!</h1>
        <p class="text-lg mt-4 text-gray-600">
            Zaloguj się, aby rozpocząć pracę lub utwórz konto, jeśli jeszcze go nie posiadasz.
        </p>

        @guest
            <div class="mt-6 space-x-4">
                <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Zaloguj się</a>
                <a href="{{ route('register') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Zarejestruj się</a>
            </div>
        @endguest
    </div>
</div>
@endsection