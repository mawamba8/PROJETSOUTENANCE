<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    // IMPORTANT : la table ne suit pas la pluralisation anglaise
    protected $table = 'rendezvous';

    protected $fillable = [
        'patient_id', 'medecin_id', 'date', 'heure', 'statut',
    ];

    protected $casts = [
        'date'=> 'date',
        'heure'=> 'time',
    ];

    /** Ce RDV appartient à un patient */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /** Ce RDV appartient à un médecin */
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
  /** Ce RDV a (au plus) une consultation associée */
    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }
}


