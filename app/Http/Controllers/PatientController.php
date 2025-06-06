<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Mail\WizytaPotwierdzonaMail;
use App\Mail\WizytaOdrzuconaMail;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    /**
     * Wyświetlanie listy pacjentów z opcją wyszukiwania i paginacją
     */
    public function index(Request $request)
    {
        if (!in_array(auth()->user()->role, ['recepcja', 'admin'])) {
            abort(403, 'Brak dostępu.');
        }

        $search = $request->input('search');

        // Wizyty oczekujące
        $pendingAppointments = Appointment::query()
            ->when($search, fn($query) => $query->where('pet_name', 'like', "%$search%"))
            ->where('status', 'pending')
            ->orderBy('appointment_date', 'asc')
            ->get();

        // Potwierdzone/odrzucone z paginacją
        $otherAppointments = Appointment::query()
            ->when($search, fn($query) => $query->where('pet_name', 'like', "%$search%"))
            ->where('status', '!=', 'pending')
            ->orderBy('appointment_date', 'asc')
            ->paginate(10);

        return view('pacjenci.index', compact('pendingAppointments', 'otherAppointments', 'search'));
    }

    /**
     * Potwierdzenie wizyty i wysłanie e-maila
     */
    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'confirmed';
        $appointment->save();

        Mail::to($appointment->email)->send(new WizytaPotwierdzonaMail($appointment));

        return redirect()->back()->with('success', 'Wizyta została potwierdzona.');
    }

    /**
     * Odrzucenie wizyty i wysłanie e-maila
     */
    public function reject($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'rejected';
        $appointment->save();

        Mail::to($appointment->email)->send(new WizytaOdrzuconaMail($appointment));

        return redirect()->back()->with('success', 'Wizyta została odrzucona, e-mail został wysłany.');
    }

    /**
     * Usunięcie wizyty/pacjenta
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Pacjent został usunięty.');
    }
}
