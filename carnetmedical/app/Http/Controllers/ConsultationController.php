<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\RendezVous;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['patient','medecin','rendezvous'])->get();
        return view('consultations.index', compact('consultations'));
    }

    public function create()
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        $rendezvous = RendezVous::all();
        return view('consultations.create', compact('patients','medecins','rendezvous'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'rendezvous_id' => 'required|exists:rendez_vous,id',
             'diagnostic' => 'required|string',
            'traitement' => 'nullable|string',
        ]);

        Consultation::create($request->all());

        return redirect()->route('consultations.index')->with('success', 'Consultation ajoutée avec succès');
    }

    public function show(Consultation $consultation)
    {
        return view('consultations.show', compact('consultation'));
    }

    public function edit(Consultation $consultation)
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        $rendezvous = RendezVous::all();
        return view('consultations.edit', compact('consultation','patients','medecins','rendezvous'));
    }
 public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'diagnostic' => 'required|string',
            'traitement' => 'nullable|string',
        ]);

        $consultation->update($request->all());

        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès');
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée avec succès');
    }

}
