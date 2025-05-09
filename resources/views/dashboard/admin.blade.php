@extends('base')
@section('title','Dashboard')
@section('content')

<div class="container py-4">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3">Bienvenue, {{ Auth::user()->name ?? 'Utilisateur' }}</h1>
        <h1 class="h3">Bienvenue, {{ Auth::user()->role ?? 'Utilisateur' }}</h1>
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
                        {{ $projets->where('status','en attente')->count()?? 0 }}
                        {{-- {{ $projets->where('status', 'en attente')->count()?? 0 }} --}}
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
                        {{ $projets->where('status', 'valide')->count() ?? 0 }}
                    </p>
                    <p class="text-muted">Projets approuvés</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bouton Nouveau Projet -->
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('gestionnaires.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Nouveau gestionnaire de projet
    </a>
</div>


 <!-- Tableau des projets -->
 @php use Illuminate\Support\Str; @endphp

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        Les promoteur
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nom du promoteur</th>
                        <th>email</th>
                        <th>Date de naissance</th>
                        <th>Lieu de naissance</th>
                        <th>Numero de telephone</th>
                        <th>Numero CNI</th>
                        @if(auth()->user()->role === 'admin')
                            <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($promoteurs as $promoteur)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $promoteur->user->name }}</td>
                        <td>{{ $promoteur->user->email }}</td>
                        <td>{{ $promoteur->date_naissance }}</td>
                        <td>{{ $promoteur->lieu_naissance }}</td>
                        <td>{{ $promoteur->numero_telephone }}</td>
                        <td>{{ $promoteur->numero_cni }}</td>
                        @if(auth()->user()->role === 'admin')
                            <td>
                                <form action="{{ route('promoteurs.destroy', $promoteur) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce promoteur?')">Supprimer</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Aucun projet enregistré.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


