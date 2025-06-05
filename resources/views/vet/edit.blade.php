@extends('layouts.app')

@section('title', 'Edycja Wizyty')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white dark:bg-gray-900 shadow rounded">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-white">Edycja wizyty: {{ $appointment->pet_name }}</h1>

    <form method="POST" action="{{ route('vet.zapisz', $appointment->id) }}">
        @csrf

        {{-- Rodzaj zwierzęcia --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Rodzaj zwierzęcia</label>
            <input type="text" name="animal_type" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="{{ old('animal_type', $appointment->animal_type) }}">
        </div>

        {{-- Rasa --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Rasa</label>
            <input type="text" name="breed" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="{{ old('breed', $appointment->breed) }}">
        </div>

        {{-- Wiek --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Wiek</label>
            <input type="text" name="age" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="{{ old('age', $appointment->age) }}">
        </div>

        {{-- Waga --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Waga (kg)</label>
            <input type="text" name="weight" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white" value="{{ old('weight', $appointment->weight) }}">
        </div>

        {{-- Uwagi specjalne --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Szczegóły specjalne</label>
            <textarea name="notes" rows="3" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white">{{ old('notes', $appointment->notes) }}</textarea>
        </div>

        {{-- Opis wizyty --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Opis wizyty</label>
            <textarea name="description" rows="5" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white">{{ old('description', $appointment->description) }}</textarea>
        </div>

        {{-- Recepta --}}
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Recepta</label>
            <textarea name="prescription" rows="4" class="w-full border rounded p-2 dark:bg-gray-800 dark:text-white">{{ old('prescription', $appointment->prescription) }}</textarea>
        </div>

        {{-- Przyciski --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('vet.wizyty') }}" class="text-sm text-indigo-600 hover:underline flex items-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Wróć do listy
            </a>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded flex items-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i> Zapisz zmiany
            </button>

            <a href="{{ route('vet.recepta', $appointment->id) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-2 print:hidden">
                <i data-lucide="printer" class="w-5 h-5"></i> Drukuj receptę
            </a>
        </div>
    </form>
</div>
@endsection
