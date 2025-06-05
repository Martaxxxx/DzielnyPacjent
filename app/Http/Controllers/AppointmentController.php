<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Mail\WizytaZarejestrowanaMail;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    // 🔹 Lista wszystkich wizyt (np. dla recepcji/weterynarza)
    public function index()
    {
        $appointments = Appointment::orderBy('appointment_date', 'asc')->get();
        return view('wizyty.index', compact('appointments'));
    }

    // 🔹 Formularz umawiania wizyty
    public function create()
    {
        return view('wizyty.umow');
    }

    // 🔹 Zapisanie nowej wizyty
    public function store(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string|max:200',
            'pet_name' => 'required|string|max:200',
            'reason' => 'required|string',
            'appointment_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'email' => 'required|email:rfc,dns',
        ]);

        $appointment = Appointment::create([
            'owner_name' => $request->owner_name,
            'pet_name' => $request->pet_name,
            'reason' => $request->reason,
            'appointment_date' => $request->appointment_date,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => 'pending',
        ]);

        // ✉️ Wyślij e-mail z potwierdzeniem
        Mail::to($appointment->email)->send(new WizytaZarejestrowanaMail($appointment));

        // ✅ Przekierowanie z komunikatem
        return redirect()->back()->with('success', 'Wizyta została zapisana i e-mail potwierdzający wysłany.');
    }

    // 🔹 Endpoint dla kalendarza
    public function json()
    {
        $appointments = Appointment::where('status', 'confirmed')->get();

        $events = $appointments->map(function ($appointment) {
            return [
                'title' => $appointment->pet_name . ' - ' . $appointment->owner_name,
                'start' => $appointment->appointment_date,
                'url' => route('vet.edytuj', $appointment->id),
            ];
        });

        return response()->json($events);
    }
}
