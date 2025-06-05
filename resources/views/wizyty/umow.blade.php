@extends('layouts.app')

@section('title', 'Umów wizytę')

@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/2.png');">
    <!-- Warstwa przyciemnienia -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative z-10 max-w-xl mx-auto mt-10 bg-white bg-opacity-95 dark:bg-gray-900 dark:bg-opacity-95 p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800 dark:text-white">Formularz wizyty</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('wizyty.zapisz') }}" method="POST" class="space-y-4">
            @csrf
            @if (session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

            <div>
                <label for="owner_name" class="block font-medium text-gray-700 dark:text-white">Imię właściciela:</label>
                <input type="text" name="owner_name" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" required>
            </div>

            <div>
                <label for="pet_name" class="block font-medium text-gray-700 dark:text-white">Imię zwierzaka:</label>
                <input type="text" name="pet_name" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" required>
            </div>

            <div>
                <label for="reason" class="block font-medium text-gray-700 dark:text-white">Powód wizyty:</label>
                <textarea name="reason" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" required></textarea>
            </div>

            <div>
                <label for="appointment_date" class="block font-medium text-gray-700 dark:text-white">Data i godzina:</label>
                <input type="datetime-local" name="appointment_date" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" step="1800" required>
            </div>

            <div>
                <label for="phone" class="block font-medium text-gray-700 dark:text-white">Numer telefonu:</label>
                <input type="tel" name="phone" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" required>
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700 dark:text-white">Adres email:</label>
                <input type="email" name="email" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" value="{{ old('email') }}" required>
            </div>

            <button type="submit" class="bg-[#8B5CF6] text-white px-4 py-2 rounded hover:bg-[#725cf6] w-full">
                Wyślij zgłoszenie
            </button>
        </form>
    </div>
</div>
@endsection
