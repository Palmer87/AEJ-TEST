@extends('base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Ajouter un projet
                            <a href="{{ url('projets') }}" class="btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projets.store') }} " method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Titre du projet</label>
                                <input type="text" name="nom" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Type de projet</label>
                                <select name="type_projet" class="form-control">
                                    <option value="projet de recherche">Projet de recherche</option>
                                    <option value="projet d'innovation">Projet d'innovation</option>
                                    <option value="projet de développement">Projet de développement</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="forme_juridique">Forme juridique</label>
                                <select name="forme_juridique" class="form-control">
                                    <option value="Société anonyme">Société anonyme</option>
                                    <option value="Société à responsabilité limitée">Société à responsabilité limitée</option>
                                    <option value="Entreprise individuelle">Entreprise individuelle</option>
                                    <option value="Association">Association</option>
                                    <option value="Particulier">Particulier</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="plan_affaires">Plan d'affaires</label>
                                <input type="file" name="plan_affaires" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
