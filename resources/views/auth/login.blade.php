@extends('layouts.app')

@section('title', 'Zaloguj się')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('/img/1.png');">
    <div class="w-full max-w-md bg-white bg-opacity-90 p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Zaloguj się do Dzielnego Pacjenta</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Hasło -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Hasło</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Zapamiętaj mnie -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="remember_me" name="remember"
                       class="mr-2 border-gray-300 rounded text-indigo-600 shadow-sm focus:ring-indigo-500">
                <label for="remember_me" class="text-sm text-gray-600">Zapamiętaj mnie</label>
            </div>

            <!-- Przyciski -->
            <div class="flex justify-between items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                        Nie pamiętasz hasła?
                    </a>
                @endif

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow">
                    Zaloguj się
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
