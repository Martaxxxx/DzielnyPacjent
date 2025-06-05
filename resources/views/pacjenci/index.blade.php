@extends('layouts.app')

@section('title', 'Lista Pacjentów')

@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/2.png');">
    <!-- Warstwa przyciemnienia -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative z-10 max-w-6xl mx-auto mt-10 p-6 bg-white bg-opacity-95 dark:bg-gray-900 dark:bg-opacity-95 shadow rounded">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-white">Lista Pacjentów</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formularz wyszukiwania -->
        <form method="GET" class="mb-6 flex justify-end">
            <input
                type="text"
                name="search"
                placeholder="Szukaj po imieniu zwierzaka..."
                value="{{ $search ?? '' }}"
                class="px-4 py-2 border rounded w-1/3"
            >
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Szukaj
            </button>
        </form>

        <!-- Tabela 1: Do akceptacji -->
        <h2 class="text-xl font-semibold mb-3 mt-4 text-indigo-700">Do akceptacji</h2>
        <table class="w-full table-auto border-collapse text-sm mb-10">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white">
                    <th class="p-2 text-left">Imię właściciela</th>
                    <th class="p-2 text-left">Imię zwierzaka</th>
                    <th class="p-2 text-left">Data wizyty</th>
                    <th class="p-2 text-left">Akceptuj</th>
                    <th class="p-2 text-left">Odrzuć</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments->where('status', 'pending') as $appointment)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="p-2">{{ $appointment->owner_name }}</td>
                        <td class="p-2">{{ $appointment->pet_name }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}</td>
                        <td class="p-2">
                            <form action="{{ route('pacjenci.potwierdz', $appointment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="bg-[#7ac759] text-white px-4 py-1 rounded  text-sm w-full inline-flex items-center justify-center gap-1">
                                    <i data-lucide="clipboard-check" class="w-4 h-4"></i> Potwierdź
                                </button>
                            </form>
                        </td>
                        <td class="p-2">
    <form action="{{ route('pacjenci.odrzuc', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <button class="bg-[#8B5CF6]  text-white px-4 py-1 rounded hover:bg-red-700 text-sm w-full inline-flex items-center justify-center gap-1">
            <i data-lucide="delete" class="w-4 h-4"></i> Odrzuć
        </button>
    </form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Brak pacjentów do zatwierdzenia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Tabela 2: Wszyscy pacjenci -->
        <h2 class="text-xl font-semibold mb-3 text-red-600">Wszyscy pacjenci (Usuń)</h2>
        <table class="w-full table-auto border-collapse text-sm">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white">
                    <th class="p-2 text-left">Imię właściciela</th>
                    <th class="p-2 text-left">Imię zwierzaka</th>
                    <th class="p-2 text-left">Email</th>
                    <th class="p-2 text-left">Telefon</th>
                    <th class="p-2 text-left">Data wizyty</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2 text-left">Usuń</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments->where('status', '!=', 'pending') as $appointment)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="p-2">{{ $appointment->owner_name }}</td>
                        <td class="p-2">{{ $appointment->pet_name }}</td>
                        <td class="p-2">{{ $appointment->email }}</td>
                        <td class="p-2">{{ $appointment->phone }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}</td>
                        <td class="p-2">
                            <span class="{{ $appointment->status === 'pending' ? 'text-yellow-600' : 'text-green-600' }} font-semibold">
                                {{ $appointment->status === 'pending' ? 'Oczekuje' : 'Potwierdzona' }}
                            </span>
                        </td>
                        <td class="p-2">
                            <form action="{{ route('pacjenci.usun', $appointment->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego pacjenta?');">
                                @csrf
                                @method('DELETE')
                                <button style="background-color: #cb6ce6;" class="text-white px-3 py-1 rounded text-sm w-full inline-flex items-center justify-center gap-1 hover:opacity-90">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">Brak potwierdzonych pacjentów do wyświetlenia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
