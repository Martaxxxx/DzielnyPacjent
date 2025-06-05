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
            'owner_name' => 'required|string|max:30',
            'pet_name' => 'required|string|max:30',
            'reason' => 'required|string',
            'appointment_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $time = \Carbon\Carbon::parse($value);
                    if (!in_array($time->minute, [0, 30])) {
                        $fail('Wizyty można umawiać wyłącznie co 30 minut (np. 10:00, 10:30).');
                    }
                }
            ],
            'phone' => 'required|string|max:12',
            'email' => 'required|email:rfc,dns',
        ]);
    
        // Sprawdzenie, czy termin jest już zajęty
        $terminZajety = Appointment::where('appointment_date', $request->appointment_date)->exists();
    
        if ($terminZajety) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Wybrany termin jest już zajęty. Proszę wybrać inny.');
        }
    
        // Zapisz wizytę
        $appointment = Appointment::create([
            'owner_name' => $request->owner_name,
            'pet_name' => $request->pet_name,
            'reason' => $request->reason,
            'appointment_date' => $request->appointment_date,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => 'pending',
        ]);
    
        // Wyślij maila
        Mail::to($appointment->email)->send(new \App\Mail\WizytaZarejestrowanaMail($appointment));
    
        return redirect()->back()->with('success', 'Wizyta została zapisana i e-mail potwierdzający wysłany.');
    
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
