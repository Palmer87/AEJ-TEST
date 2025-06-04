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
                    <a href="{{ asset('storage/' . $projets->plan_affaires) }}" target="_blank" class="btn btn-secondary">
                        Voir le document
                    </a>
                </p>
            @else
                <p><strong>Plan d'affaires :</strong> Non fourni</p>
            @endif
            <div class="d-flex justify-content-between ">
                <a href="{{ redirect()->back()}}" class="btn btn-secondary mt-3">Retour à la liste</a>
                @if (auth()->user()->role === 'gestionnaire')
                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#correctionModal">
                    Demander une correction
                </button>
            </div>
            @endif
            <!-- Bouton pour ouvrir le modal -->


            <!-- Modal Bootstrap -->
<div class="modal fade" id="correctionModal" tabindex="-1" aria-labelledby="correctionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="correctionModalLabel">Demande de correction</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>


        <form method="POST" action="{{ route('correction-request.send') }}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
          @csrf
          <input type="hidden" name="projet_id" value="{{ $projets->id }}">



          <div class="modal-body">
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Indiquez les éléments à corriger..." required></textarea>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>




                <!-- Modal de Demande de Correction -->

    </div>
</div>
@endsection
