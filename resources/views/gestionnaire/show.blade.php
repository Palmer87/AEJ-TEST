@extends('base')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Détails du projet</h4>
        </div>
        <div class="card-body">
           <h1> <p><strong>Titre :</strong> {{ $projet->titre }}</p></h1>
            <p><strong>Type de projet :</strong> {{ $projet->type_projet }}</p>
            <p><strong>Forme juridique :</strong> {{ $projet->forme_juridique }}</p>
            <p><strong>Statut :</strong> {{ $projet->status }}</p>

            @if($projet->plan_affaires)
                <p>
                    <strong>Plan d'affaires :</strong>
                    <a href="{{ asset('storage/' . $projet->plan_affaires) }}" target="_blank">
                        Voir le document
                    </a>
                </p>
            @else
                <p><strong>Plan d'affaires :</strong> Non fourni</p>
            @endif

            <a href="{{ route('promoteur.dashboard') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
