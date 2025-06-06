<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class VetController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::where('status', 'confirmed');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('owner_name', 'like', "%{$search}%")
                  ->orWhere('pet_name', 'like', "%{$search}%")
                  ->orWhere('appointment_date', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('prescription', 'like', "%{$search}%")
                  ->orWhere('animal_type', 'like', "%{$search}%")
                  ->orWhere('breed', 'like', "%{$search}%")
                  ->orWhere('age', 'like', "%{$search}%")
                  ->orWhere('weight', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
                  
            });
        }

        $appointments = $query->orderBy('appointment_date', 'asc')->get();
        $appointments = $query->orderBy('appointment_date', 'asc')->paginate(10);


        return view('vet.index', compact('appointments'));
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('vet.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description'   => 'nullable|string',
            'prescription'  => 'nullable|string',
            'animal_type'   => 'nullable|string|max:100',
            'breed'         => 'nullable|string|max:100',
            'age'           => 'nullable|string|max:50',
            'weight'        => 'nullable|string|max:50',
            'notes'         => 'nullable|string|max:500',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->description   = $request->description;
        $appointment->prescription  = $request->prescription;
        $appointment->animal_type   = $request->animal_type;
        $appointment->breed         = $request->breed;
        $appointment->age           = $request->age;
        $appointment->weight        = $request->weight;
        $appointment->notes         = $request->notes;
        $appointment->save();

        return redirect()->route('vet.wizyty')->with('success', 'Dane wizyty zostały zapisane.');
    }

    public function printPrescription($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('vet.prescription', compact('appointment'));
    }
    public function destroy($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();

    return redirect()->route('vet.wizyty')->with('success', 'Wizyta została usunięta.');
}

}