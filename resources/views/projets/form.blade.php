@extends('admin.base')
@section('content')
<div class="row  mg-">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Ajouter une propriété
                    <a href="{{ url('dashboard/promoteur') }}" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">
                <form class="vstack gap-3" action="{{ route($projet->exists ? 'projets.update':'projets.store', $projet) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($projet->exists ? 'PUT' : 'POST')

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'titre',
                            'label' => 'Titre',
                            'value'=>(old('titre', $projet->titre))

                        ])

                    </div>
                    <div class="row">
                            <label for="type_projet" class="form-label">Type de projet</label>
                            <select name="type_projet" class="form-control">
                                <option value="">-- Choisir le type de projet --</option>
                                <option value="EN DEVELOPPEMENT" {{ old('type_projet', $projet->type_projet) == 'EN DEVELOPPEMENT' ? 'selected' : '' }}>EN DEVELOPPEMENT</option>
                                <option value="EN CREATION" {{ old('type_projet', $projet->type_projet) == 'EN CREATION' ? 'selected' : '' }}>EN CREATION</option>
                            </select>
                        </div>


                    <div class="row">
                            <label for="forme_juridique" class="form-label">Forme juridique</label>
                            <select name="forme_juridique" class="form-control">
                                <option value="">-- Choisir la forme juridique --</option>
                                <option value="SARL"{{old('forme_juridique',$projet->forme_juridique='SARL'?'selected':'')}}>SARL</option>
                                <option value="SAS"{{old('forme_juridique',$projet->forme_juridique='SAS'?'selected':'')}}>SAS</option>
                                <!-- Autres options -->
                            </select>
                        </div>


                        @include('shared.input', [
                                'class' => 'col',
                                'name' => 'plan_affaires',
                                'label' => 'Business plan',
                                'type' => 'file',
                                'value'=>(old('plan_affaires', $projet->plan_affaires))
                            ])

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
