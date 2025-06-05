@extends('layouts.app')

@section('title', 'Panel Weterynarza')

@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/2.png');">

    <div class="max-w-6xl mx-auto mt-10 p-6 bg-white bg-opacity-90 dark:bg-gray-900 dark:bg-opacity-90 shadow rounded">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-white">Potwierdzone wizyty</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

     <!-- Kalendarz wizyt -->
<div id="calendar" class="mb-10 bg-white dark:bg-gray-800 p-4 rounded shadow border border-[#cb6ce6] text-sm leading-tight break-words"></div>


        <!-- Wyszukiwarka -->
        <form method="GET" class="mb-6 flex justify-end">
            <input
                type="text"
                name="search"
                placeholder="Szukaj wizyty..."
                value="{{ request('search') }}"
                class="px-4 py-2 border rounded w-1/3"
            >
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 flex items-center gap-2">
                <i data-lucide="search" class="w-4 h-4"></i> Szukaj
            </button>
        </form>

        <!-- Tabela wizyt -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse text-sm rounded">
                <thead>
                    <tr class="bg-[#cb6ce6] text-white text-sm uppercase">
                        <th class="px-4 py-3 text-left">Właściciel</th>
                        <th class="px-4 py-3 text-left">Zwierzak</th>
                        <th class="px-4 py-3 text-left">Data wizyty</th>
                        <th class="px-4 py-3 text-left">Opis</th>
                        <th class="px-4 py-3 text-left">Recepta</th>
                        <th class="px-4 py-3 text-left">Działania</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                        <tr class="border-b border-gray-200 even:bg-gray-50 dark:border-gray-700 dark:even:bg-gray-800">
                            <td class="px-4 py-2">{{ $appointment->owner_name }}</td>
                            <td class="px-4 py-2">{{ $appointment->pet_name }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}</td>
                            <td class="px-4 py-2">
                                {{ $appointment->description ? Str::limit($appointment->description, 30) : '—' }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $appointment->prescription ? Str::limit($appointment->prescription, 30) : '—' }}
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('vet.edytuj', $appointment->id) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700 text-sm inline-flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M4.5 1a.5.5 0 0 1 .5.5V6a2 2 0 0 0 4 0V1.5a.5.5 0 0 1 1 0V6a3 3 0 0 1-5 2.236V9.5a4.5 4.5 0 0 0 9 0V7.5a.5.5 0 0 1 1 0v2a5.5 5.5 0 1 1-11 0v-.264A3 3 0 0 1 3 6V1.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        Edytuj
                                    </a>
                                    @if ($appointment->prescription)
                                        <a href="{{ route('vet.recepta', $appointment->id) }}" target="_blank" class="bg-purple-600 text-white px-3 py-1 rounded hover:bg-purple-700 text-sm inline-flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 9V4.5A1.5 1.5 0 017.5 3h9A1.5 1.5 0 0118 4.5V9m-12 0h12a1.5 1.5 0 011.5 1.5v6A1.5 1.5 0 0118 18H6a1.5 1.5 0 01-1.5-1.5v-6A1.5 1.5 0 016 9zm3 3.75h6" />
                                            </svg>
                                            Receptę
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">Brak potwierdzonych wizyt.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
