<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'email',
        'telephone',
        'sexe',
    ];

    // 🔗 Un patient peut avoir plusieurs rendez-vous
    public function rendezvous()
    {
        return $this->hasMany(RendezVous::class);
    }

// 🔗 Un patient peut avoir plusieurs consultations
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    // 🔗 Un patient peut avoir plusieurs carnets médicaux
    public function carnetMedical()
    {
        return $this->hasMany(CarnetMedical::class);
    }
}
