<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\VetController;
use App\Http\Controllers\AdminController;
use App\Models\Appointment;

// Strona główna
Route::get('/', function () {
    return view('dashboard');
});

// Dashboard (dla zalogowanych + zweryfikowanych)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Trasy tylko dla zalogowanych użytkowników
Route::middleware('auth')->group(function () {

    // 👤 Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Pacjenci (dla recepcji i admina — kontrolowane w kontrolerze)
    Route::get('/pacjenci', [PatientController::class, 'index'])->name('pacjenci.index');
    Route::put('/pacjenci/{id}/potwierdz', [PatientController::class, 'confirm'])->name('pacjenci.potwierdz');
    Route::put('/pacjenci/{id}/odrzuc', [PatientController::class, 'reject'])->name('pacjenci.odrzuc');
    Route::delete('/pacjenci/{id}', [PatientController::class, 'destroy'])->name('pacjenci.usun');

    //  Wizyty
    Route::get('/wizyty', [AppointmentController::class, 'create'])->name('wizyty.umow');
    Route::post('/wizyty', [AppointmentController::class, 'store'])->name('wizyty.zapisz');

    //  Weterynarz – panel
    Route::get('/vet', [VetController::class, 'index'])->name('vet.wizyty');
    Route::get('/vet/{id}/edytuj', [VetController::class, 'edit'])->name('vet.edytuj');
    Route::post('/vet/{id}', [VetController::class, 'update'])->name('vet.zapisz');
    Route::get('/vet/{id}/recepta', [VetController::class, 'printPrescription'])->name('vet.recepta');

    //  Panel administratora (sprawdzenie roli w kontrolerze)
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/uzytkownicy/{user}/edytuj', [AdminController::class, 'edit'])->name('admin.uzytkownicy.edytuj');
    Route::put('/admin/uzytkownicy/{user}', [AdminController::class, 'update'])->name('admin.uzytkownicy.update');
    Route::delete('/admin/uzytkownicy/{user}', [AdminController::class, 'destroy'])->name('admin.uzytkownicy.usun');
});

// API – dane do kalendarza
Route::get('/api/wizyty-json', [AppointmentController::class, 'json'])->name('wizyty.json');
// historia logowań

Route::get('/admin/uzytkownicy/{user}/logi', [AdminController::class, 'logs'])->name('admin.uzytkownicy.logi');

require __DIR__.'/auth.php';
