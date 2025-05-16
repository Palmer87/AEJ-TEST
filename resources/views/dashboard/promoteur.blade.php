@extends('base')
@section('title','Dashboard')
@section('content')

<div class="container py-4">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3">Bienvenue, {{ Auth::user()->email ?? 'Utilisateur' }}</h1>
        <p class="text-muted">Voici votre tableau de bord</p>
    </div>

    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Projets</h5>
                    <p class="card-text display-6">{{ $projets->count() ?? 0 }}</p>
                    <p class="text-muted">Total de vos projets enregistrés</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">En attente</h5>
                    <p class="card-text display-6">
                        {{ $projets->where('status', 'en attente')->count() ?? 0 }}
                    </p>
                    <p class="text-muted">Projets en cours de validation</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Validés</h5>
                    <p class="card-text display-6">
                        {{ $projets->where('status', 'validé')->count() ?? 0 }}
                    </p>
                    <p class="text-muted">Projets approuvés</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bouton Nouveau Projet -->
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('projets.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Nouveau projet
    </a>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des projets</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Type du pojet</th>
                            <th>La forme juridique</th>
                            <th>Etat du projet</th>
                            <th>Plan d'affaires</th>
                            <th>date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projets as $projet)
                        <tr>
                            <td>{{ $projet->titre }}</td>
                            <td>{{ $projet->type_projet }}</td>
                            <td>{{ $projet->forme_juridique }}</td>
                            <td>
                                <span class="badge bg-{{
                                    $projet->status === 'validé' ? 'success' :
                                    ($projet->status === 'rejeté' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($projet->status) }}
                                </span>
                            </td>
                            <td>
                                @if($projet->plan_affaires)
                                    <a href="{{ asset('storage/'.$projet->plan_affaires) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-info" onclick="event.stopPropagation()">
                                        <i class="fas fa-file-pdf"></i> Voir PDF
                                    </a>
                                @else
                                    <span class="text-muted">Aucun fichier</span>
                                @endif
                            </td>
                            <td>{{ $projet->created_at->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection


