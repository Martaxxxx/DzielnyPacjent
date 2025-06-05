@extends('layouts.app')

@section('title', 'Rejestracja')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('/img/1.png');">
    <div class="w-full max-w-md bg-white bg-opacity-90 p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Załóż konto</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Imię i nazwisko -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Imię i nazwisko</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
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

            <!-- Potwierdź hasło -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-semibold">Potwierdź hasło</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-indigo-300">
                @error('password_confirmation')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Przyciski -->
            <div class="flex justify-between items-center">
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline">
                    Masz już konto?
                </a>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow">
                    Zarejestruj się
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
