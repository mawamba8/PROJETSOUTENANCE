<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Consultation extends Model
{
    use HasFactory;

     protected $table = 'consultations';

    protected $fillable = [
           'patient_id','medecin_id','rendezvous_id', 'diagnostic', 'prescription','motif'
    ];

// 🔗 Consultation appartient à un patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // 🔗 Consultation appartient à un médecin
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    // 🔗 Consultation liée à un rendez-vous
    public function rendezvous()
    {
        return $this->belongsTo(RendezVous::class);
    }
}

   

