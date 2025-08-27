@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tableau de bord - Médecin</h1>

    <div class="row">
        <!-- Patients -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Mes Patients</div>
                <div class="card-body">
                    <p>Total : {{ $patients->count() }}</p>
                    <a href="{{ route('patients.index') }}" class="btn btn-primary">Voir la liste</a>
                </div>
            </div>
        </div>

        <!-- Rendez-vous -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Mes Rendez-vous</div>
                <div class="card-body">
                    @foreach($rendezvous as $rdv)
                        <p>{{ $rdv->date }} avec {{ $rdv->patient->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Statistiques</div>
<div class="card-body">
                    <p>Consultations : {{ $consultations->count() }}</p>
                    <p>Notifications : {{ $notifications->count() }}</p>
                    <a href="{{ route('statistiques.index') }}" class="btn btn-success">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
