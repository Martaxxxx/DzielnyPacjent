<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (tylko dla zalogowanych + zweryfikowanych)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Trasy tylko dla zalogowanych użytkowników
Route::middleware('auth')->group(function () {

    // 👤 Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🐾 Pacjenci (dla recepcji, tymczasowo dla wszystkich zalogowanych)
    Route::get('/pacjenci', [PatientController::class, 'index'])->name('pacjenci.index');
    Route::put('/pacjenci/{id}/potwierdz', [PatientController::class, 'confirm'])->name('pacjenci.potwierdz');
    Route::delete('/pacjenci/{id}', [PatientController::class, 'destroy'])->name('pacjenci.usun');

    // Wizyty (formularz + lista)
    Route::get('/wizyty', [AppointmentController::class, 'create'])->name('wizyty.umow');
Route::post('/wizyty', [AppointmentController::class, 'store'])->name('wizyty.zapisz');
});

// dla weterynarza
Route::middleware(['auth', 'role:weterynarz'])->group(function () {
    Route::get('/wizyty/potwierdzone', [App\Http\Controllers\VetController::class, 'index'])->name('vet.wizyty');
    Route::get('/wizyty/{id}/edytuj', [App\Http\Controllers\VetController::class, 'edit'])->name('vet.edytuj');
    Route::post('/wizyty/{id}', [App\Http\Controllers\VetController::class, 'update'])->name('vet.zapisz');
});
require __DIR__.'/auth.php';
