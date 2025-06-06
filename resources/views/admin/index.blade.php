@extends('layouts.app')

@section('title', 'Panel Administratora')

@section('content')
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('/img/3.png');">
    <!-- Przyciemnienie tła -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative z-10 max-w-6xl mx-auto mt-16 p-6 bg-white bg-opacity-95 dark:bg-gray-900 dark:bg-opacity-90 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-white">Zarządzanie użytkownikami</h1>

        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Wyszukiwarka -->
        <form method="GET" class="mb-6 flex justify-end">
            <input
                type="text"
                name="search"
                placeholder="Szukaj użytkownika..."
                value="{{ request('search') }}"
                class="px-4 py-2 border rounded w-1/3"
            >
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 flex items-center gap-2">
                <i data-lucide="search" class="w-4 h-4"></i> Szukaj
            </button>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse text-sm rounded shadow-sm">
                <thead class="bg-[#cb6ce6] text-white uppercase text-xs">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Imię</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Rola</th>
                        <th class="p-3 text-left">Akcje</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @forelse ($users as $user)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-3">{{ $user->id }}</td>
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3 capitalize">{{ $user->role }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('admin.uzytkownicy.edytuj', $user->id) }}" class="text-indigo-600 hover:underline text-sm">Edytuj</a>

                                <a href="{{ route('admin.uzytkownicy.logi', $user->id) }}" class="text-gray-600 hover:underline text-sm">Logi</a>

                                <form action="{{ route('admin.uzytkownicy.usun', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">Brak wyników.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
