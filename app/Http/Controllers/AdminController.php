<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoginLog;

class AdminController extends Controller
{
    /**
     * Sprawdza, czy obecnie zalogowany użytkownik jest administratorem.
     */
    protected function authorizeAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Brak dostępu.');
        }
    }

    /**
     * Lista wszystkich użytkowników z wyszukiwarką.
     */
    public function index(Request $request)
    {
        $this->authorizeAdmin();

        $users = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $users->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
            });
        }

        $users = $users->get();

        return view('admin.index', compact('users'));
    }

    /**
     * Formularz edycji konkretnego użytkownika.
     */
    public function edit(User $user)
    {
        $this->authorizeAdmin();

        return view('admin.edit', compact('user'));
    }

    /**
     * Zapisuje zmiany w danych użytkownika.
     */
    public function update(Request $request, User $user)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'role' => 'required|in:admin,recepcja,weterynarz,pacjent',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.index')->with('success', 'Użytkownik zaktualizowany.');
    }

    /**
     * Usunięcie użytkownika.
     */
    public function destroy(User $user)
    {
        $this->authorizeAdmin();

        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'Nie możesz usunąć samego siebie.');
        }

        $user->delete();

        return redirect()->route('admin.index')->with('success', 'Użytkownik usunięty.');
    }

    /**
     * Historia logowań użytkownika.
     */
    public function logs(User $user)
    {
        $this->authorizeAdmin();

        $logs = $user->loginLogs()->latest()->paginate(10);

        return view('admin.logs', compact('user', 'logs'));
    }
}
