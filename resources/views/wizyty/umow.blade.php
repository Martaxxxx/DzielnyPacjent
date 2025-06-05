@extends('layouts.app')

@section('title', 'Umów wizytę')

@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/2.png');">
<div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-900 p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4 text-center">Formularz wizyty</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('wizyty.zapisz') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="owner_name" class="block">Imię właściciela:</label>
            <input type="text" name="owner_name" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="pet_name" class="block">Imię zwierzaka:</label>
            <input type="text" name="pet_name" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="reason" class="block">Powód wizyty:</label>
            <textarea name="reason" class="w-full p-2 border rounded" required></textarea>
        </div>

        <div>
            <label for="appointment_date" class="block">Data i godzina:</label>
            <input type="datetime-local" name="appointment_date" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="phone" class="block">Numer telefonu:</label>
            <input type="tel" name="phone" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Adres email:</label>
            <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email') }}" required>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Wyślij zgłoszenie
        </button>
    </form>
</div>
@endsection
