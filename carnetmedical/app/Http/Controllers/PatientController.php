<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
      // Liste des patients
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }
    // Formulaire ajout patient
    public function create()
    {
        $patient = new patient();
        return view('patients.create', compact('patient'));
    }
    // Enregistrer un patient
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required','string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'date_naissance' =>[ 'required', 'date'],
            'email' => ['nullable','email','max:255'],
            'telephone' => ['required','string', 'max:20'],
            'sexe'=> ['required','string', 'max:1'],//ajout sexe
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès');
    }


    public function show($id)
    {
        $patient = Patient::findOrfail($id);
        return view('patients.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrfail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'nom' => 'required', 'string',
            'prenom' => 'required', 'string',
            'date_naissance' => 'required', 'date',
            'email' => 'nullable','email',
            'telephone' => 'required','string',
            'sexe'=> 'required','string',
        ]);
        
        $patient->update($request->all());
 return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès');
    }

    
}

