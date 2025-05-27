@extends('base')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Détails du projets</h4>
        </div>
        <div class="card-body">
           <h1> <p><strong>Titre :</strong> {{ $projets->titre }}</p></h1>
            <p><strong>Type de projets :</strong> {{ $projets->type_projets }}</p>
            <p><strong>Forme juridique :</strong> {{ $projets->forme_juridique }}</p>
            <p><strong>Statut :</strong> {{ $projets->status }}</p>

            @if($projets->plan_affaires)
                <p>
                    <strong>Plan d'affaires :</strong>
                    <a href="{{ asset('storage/' . $projets->plan_affaires) }}" target="_blank">
                        Voir le document
                    </a>
                </p>
            @else
                <p><strong>Plan d'affaires :</strong> Non fourni</p>
            @endif
            <a href="{{ redirect()->back()}}" class="btn btn-secondary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
