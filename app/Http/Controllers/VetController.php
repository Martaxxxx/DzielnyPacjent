<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class VetController extends Controller
{
    /**
     * Lista potwierdzonych wizyt
     */
    public function index()
    {
        $appointments = Appointment::where('status', 'confirmed')
            ->orderBy('appointment_date')
            ->get();

        return view('weterynarz.index', compact('appointments'));
    }

    /**
     * Formularz edycji wizyty
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('weterynarz.edit', compact('appointment'));
    }

    /**
     * Zapis zmian w wizycie
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'recommendation' => 'nullable|string',
            'prescription' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'description' => $request->description,
            'diagnosis' => $request->diagnosis,
            'recommendation' => $request->recommendation,
            'prescription' => $request->prescription,
        ]);

        return redirect()->route('vet.wizyty')->with('success', 'Wizyta została zaktualizowana.');
    }
}
