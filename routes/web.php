<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\VetController;
use App\Models\Appointment;

Route::get('/', function () {
    return view('dashboard');
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

    // 🐾 Pacjenci (dla recepcji)
    Route::get('/pacjenci', [PatientController::class, 'index'])->name('pacjenci.index');
    Route::put('/pacjenci/{id}/potwierdz', [PatientController::class, 'confirm'])->name('pacjenci.potwierdz');
    Route::delete('/pacjenci/{id}', [PatientController::class, 'destroy'])->name('pacjenci.usun');

    // Wizyty (formularz + lista)
    Route::get('/wizyty', [AppointmentController::class, 'create'])->name('wizyty.umow');
    Route::post('/wizyty', [AppointmentController::class, 'store'])->name('wizyty.zapisz');

    // Vet - Panel weterynarza
    Route::get('/vet', [VetController::class, 'index'])->name('vet.wizyty');
    Route::get('/vet/{id}/edytuj', [VetController::class, 'edit'])->name('vet.edytuj');
    Route::post('/vet/{id}', [VetController::class, 'update'])->name('vet.zapisz');
    Route::get('/vet/{id}/recepta', [VetController::class, 'printPrescription'])->name('vet.recepta');


});
Route::get('/api/wizyty-json', [AppointmentController::class, 'json'])->name('wizyty.json');

require __DIR__.'/auth.php';
