@extends('layouts.app')

@section('title', 'Edycja użytkownika')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-cover bg-center relative" style="background-image: url('/img/3.png');">
    <!-- Przyciemnienie tła -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative z-10 bg-white bg-opacity-95 p-6 rounded shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edycja użytkownika</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.uzytkownicy.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Imię i nazwisko</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Rola</label>
                <select name="role" class="w-full p-2 border rounded" required>
                    @foreach(['admin', 'recepcja', 'weterynarz', 'pacjent'] as $rola)
                        <option value="{{ $rola }}" @selected($user->role === $rola)>{{ ucfirst($rola) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('admin.index') }}" class="text-sm text-indigo-600 hover:underline">← Wróć</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Zapisz zmiany
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
