<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
      public function index()
    {
        $rendezvous = RendezVous::with(['patient','medecin'])->get();
        return view('rendezvous.index', compact('rendezvous'));
    }

    public function create()
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('rendezvous.create', compact('patients', 'medecins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date' => 'required|date',
            'heure' => 'required',
        ]);

  RendezVous::create($request->all());

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous créé avec succès');
    }

     public function index(RendezVous $rendezvous)
    {
        return view('rendezvous.index', compact('rendezvous'));
    }

    public function show(RendezVous $rendezvou)
    {
        return view('rendezvous.show', compact('rendezvous'));
    }

    public function edit(RendezVous $rendezvous)
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('rendezvous.edit', compact('rendezvous','patients','medecins'));
    }
 public function update(Request $request, RendezVous $rendezvous)
    {
        $request->validate([
            'date' => 'required|date',
            'heure' => 'required',
        ]);

        $rendezvous->update($request->all());

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous mis à jour avec succès');
    }

    public function destroy(RendezVous $rendezvous)
    {
        $rendezvous->delete();
        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous supprimé avec succès');
    }

}
