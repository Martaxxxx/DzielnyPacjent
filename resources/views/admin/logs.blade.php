@extends('layouts.app')

@section('title', 'Historia logowań')

@section('content')
<div class="min-h-screen bg-cover bg-center relative" style="background-image: url('/img/3.png');">
    <div class="absolute inset-0 bg-black/30"></div>

    <div class="relative z-10 max-w-4xl mx-auto mt-16 bg-white bg-opacity-95 dark:bg-gray-900 dark:bg-opacity-90 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
            Historia logowań – {{ $user->name }}
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm table-auto border-collapse mb-6">
                <thead class="bg-[#cb6ce6] text-white text-xs uppercase">
                    <tr>
                        <th class="p-3 text-left">Data</th>
                        <th class="p-3 text-left">Adres IP</th>
                        <th class="p-3 text-left">Przeglądarka</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @forelse ($logs as $log)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-3">{{ $log->created_at->setTimezone('Europe/Warsaw')->format('d.m.Y H:i') }}</td>
                            <td class="p-3">{{ $log->ip_address }}</td>
                            <td class="p-2">
                                @php
                                    $agent = $log->user_agent;
                                    $browser = 'Nieznana';

                                    if (Str::contains($agent, 'Chrome')) {
                                        $browser = 'Chrome';
                                    } elseif (Str::contains($agent, 'Firefox')) {
                                        $browser = 'Firefox';
                                    } elseif (Str::contains($agent, 'Safari') && !Str::contains($agent, 'Chrome')) {
                                        $browser = 'Safari';
                                    } elseif (Str::contains($agent, 'Edg')) {
                                        $browser = 'Edge';
                                    }
                                @endphp
                                {{ $browser }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">Brak logowań.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mb-4">
            {{ $logs->links() }}
        </div>

        <a href="{{ route('admin.index') }}" class="text-indigo-600 hover:underline text-sm">← Wróć do listy użytkowników</a>
    </div>
</div>
@endsection
