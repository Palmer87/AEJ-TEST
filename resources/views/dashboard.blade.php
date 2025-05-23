@extends('base')
@section('title','Dashboard')
@section('content')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3">Bienvenue, {{ Auth::user()->name ?? 'Utilisateur' }}</h1>
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
                        {{ $projets->where('statut', 'en_attente')->count() ?? 0 }}
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
                        {{ $projets->where('statut', 'valide')->count() ?? 0 }}
                    </p>
                    <p class="text-muted">Projets approuvés</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des projets -->
    @php use Illuminate\Support\Str; @endphp

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Vos projets
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Statut</th>
                            <th>Date de soumission</th>
                            @if(auth()->user()->role === 'admin')
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projets as $projet)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $projet->nom }}</td>
                            <td>
                                <span class="badge bg-{{
                                    $projet->statut === 'valide' ? 'success' :
                                    ($projet->statut === 'rejeté' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($projet->statut) }}
                                </span>
                            </td>
                            <td>{{ $projet->created_at->format('d/m/Y') }}</td>

                            @if(auth()->user()->role === 'admin')
                            <td>
                                @if($projet->statut === 'en attente')
                                    {{-- Bouton Valider --}}
                                    <form action="{{ route('admin.projets.valider', $projet) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Valider</button>
                                    </form>

                                    {{-- Formulaire de rejet --}}
                                    <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#rejeterForm{{ $projet->id }}">
                                        Rejeter
                                    </button>

                                    <div class="collapse mt-2" id="rejeterForm{{ $projet->id }}">
                                        <form action="{{ route('admin.projets.rejeter', $projet) }}" method="POST">
                                            @csrf
                                            <textarea name="justification" class="form-control mb-2" rows="2" required placeholder="Motif du rejet"></textarea>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Confirmer le rejet</button>
                                        </form>
                                    </div>
                                @else
                                    <em class="text-muted">Aucune action</em>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Aucun projet pour le moment.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


