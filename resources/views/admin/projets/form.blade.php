@extends('admin.base')
@section('content')
<div class="row  mg-">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Ajouter une propriété
                    <a href="{{ url('admin/projet') }}" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">
                <form class="vstack gap-3" action="{{ route($projet->exists ? 'admin.projets.update':'admin.projets.store', $projet) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($projet->exists ? 'PUT' : 'POST')

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'titre',
                            'label' => 'Titre',
                            'value' => $projet->titre
                        ])

                    </div>
                    <div class="row">
                            <label for="type_projet" class="form-label">Type de projet</label>
                            <select name="type_projet" class="form-control">
                                <option value="">-- Choisir le type de projet --</option>
                                <option value="EN DEVELOPPEMENT" {{ $projet->type_projet == 'EN DEVELOPPEMENT' ? 'selected' : '' }}>EN DEVELOPPEMENT</option>
                                <option value="EN CREATION" {{ $projet->type_projet == 'EN CREATION' ? 'selected' : '' }}>EN CREATION</option>
                                <!-- Ajoute d'autres options selon tes besoins -->
                            </select>
                        </div>


                    <div class="row">
                            <label for="forme_juridique" class="form-label">Forme juridique</label>
                            <select name="forme_juridique" class="form-control">
                                <option value="">-- Choisir la forme juridique --</option>
                                <option value="SARL" {{ $projet->forme_juridique == 'SARL' ? 'selected' : '' }}>SARL</option>
                                <option value="SAS" {{ $projet->forme_juridique == 'SAS' ? 'selected' : '' }}>SAS</option>
                                <!-- Autres options -->
                            </select>
                        </div>


                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'plan_affaires',
                            'label' => 'Business plan',
                            'value' => $projet->plan_affaires,
                            'type' => 'file'
                        ])
                         <div class="row">
                            <label for="etat" class="form-label">Type de projet</label>
                            <select name="etat" class="form-control">
                                <option value="">-- Choisir le type de projet --</option>
                                <option value="Agricole" {{ $projet->etat == 'Agricole' ? 'selected' : '' }}>Agricole</option>
                                <option value="Numérique" {{ $projet->etat == 'Numérique' ? 'selected' : '' }}>Numérique</option>
                                <!-- Ajoute d'autres options selon tes besoins -->
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                {{ $projet->exists ? 'Modifier' : 'Ajouter' }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
