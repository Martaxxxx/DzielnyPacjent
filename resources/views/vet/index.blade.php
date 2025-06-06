@extends('layouts.app')

@section('title', 'Panel Weterynarza')

@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/2.png');">
    <!-- Przyciemnienie tła -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative z-10 max-w-6xl mx-auto mt-10 p-6 bg-white bg-opacity-95 dark:bg-gray-900 dark:bg-opacity-95 shadow rounded">
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
                                    <a href="{{ route('vet.edytuj', $appointment->id) }}" class="bg-[#7ac759] text-white px-3 py-1 rounded hover:bg-[#7ac759]-700 text-sm inline-flex items-center gap-1">
                                        <i data-lucide="edit" class="w-4 h-4"></i> Edytuj
                                    </a>
                                    <form action="{{ route('vet.usun', $appointment->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę wizytę?');">
    @csrf
    @method('DELETE')
    <button class="bg-[#ee5966]  text-white px-3 py-1 rounded hover:bg-[#ee5966] text-sm inline-flex items-center gap-1">
        <i data-lucide="trash-2" class="w-4 h-4"></i>
    </button>
</form>

                                    @if ($appointment->prescription)
                                        <a href="{{ route('vet.recepta', $appointment->id) }}" target="_blank" class="bg-purple-600 text-white px-3 py-1 rounded hover:bg-purple-700 text-sm inline-flex items-center gap-1">
                                            <i data-lucide="printer" class="w-4 h-4"></i> Receptę
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

        <!-- Paginacja -->
        <div class="mt-6">
            {{ $appointments->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
