@extends('layouts.app')

@section('title', 'Panel Weterynarza')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Potwierdzone Wizyty</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse bg-white shadow rounded">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-3">Data</th>
                <th class="p-3">Właściciel</th>
                <th class="p-3">Zwierzak</th>
                <th class="p-3">Działania</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $appointment)
                <tr class="border-b">
                    <td class="p-3">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d.m.Y H:i') }}</td>
                    <td class="p-3">{{ $appointment->owner_name }}</td>
                    <td class="p-3">{{ $appointment->pet_name }}</td>
                    <td class="p-3">
                        <a href="{{ route('vet.edytuj', $appointment->id) }}" class="text-indigo-600 hover:underline">Otwórz wizytę</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">Brak potwierdzonych wizyt.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
