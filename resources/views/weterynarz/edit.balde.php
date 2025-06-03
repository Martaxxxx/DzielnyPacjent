@extends('layouts.app')

@section('title', 'Wizyta — edycja')

@section('content')
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow p-6 rounded">
        <h2 class="text-2xl font-bold mb-6 text-center">Edycja wizyty: {{ $appointment->pet_name }}</h2>

        <p class="mb-4 text-gray-600">
            <strong>Właściciel:</strong> {{ $appointment->owner_name }} <br>
            <strong>Data wizyty:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}
        </p>

        <form method="POST" action="{{ route('vet.zapisz', $appointment->id) }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Opis wizyty</label>
                <textarea name="description" rows="3" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('description', $appointment->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Diagnoza</label>
                <textarea name="diagnosis" rows="3" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('diagnosis', $appointment->diagnosis) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Zalecenia</label>
                <textarea name="recommendation" rows="3" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('recommendation', $appointment->recommendation) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Recepta</label>
                <textarea name="prescription" rows="3" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('prescription', $appointment->prescription) }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Zapisz wizytę</button>
            </div>
        </form>
    </div>
@endsection
