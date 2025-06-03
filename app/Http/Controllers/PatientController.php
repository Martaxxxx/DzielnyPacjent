<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Mail\WizytaPotwierdzonaMail;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    /**
     * Wyświetlanie listy pacjentów z opcją wyszukiwania
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $appointments = Appointment::query()
            ->when($search, function ($query, $search) {
                return $query->where('pet_name', 'like', '%' . $search . '%');
            })
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('pacjenci.index', compact('appointments', 'search'));
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
     * Usunięcie wizyty/pacjenta
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Pacjent został usunięty.');
    }
}
