@extends('base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Ajouter un projet
                            <a href="{{redirect()->back() }}" class="btn btn-danger float-end">Retour</a>
                        </h4>

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projets.update', $projets->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="">Titre du projet</label>
                                <input type="text" name="titre" class="form-control" id="titre" value="{{old('titre',$projets->titre)}}">
                                @error('titre')
                                <small class="text-danger">{{ $message }}</small>
                                 @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control"
                                    id="description">{{old('description',$projets->description)}}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                     @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type_projet" class="form-label">Type de projet</label>
                                <select name="type_projet" id="type_projet" class="form-control" >
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="Agriculture" {{ old('type_projet',$projets->type_projet) == 'Agriculture' ? 'selected' : '' }}>
                                        Agriculture</option>
                                    <option value="Technologie" {{ old('type_projet',$projets->type_projet) == 'Technologie' ? 'selected' : '' }}>
                                        Technologie</option>
                                    <option value="Commerce" {{ old('type_projet',$projets->type_projet) == 'Commerce' ? 'selected' : '' }}>Commerce
                                    </option>
                                    <option value="Industrie" {{ old('type_projet',$projets->type_projet) == 'Industrie' ? 'selected' : '' }}>
                                        Industrie</option>
                                    <!-- Ajoute d'autres type_projets si besoin -->
                                </select>
                                @error('type_projet')
                                <small class="text-danger">{{ $message }}</small>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="forme_juridique" class="form-label">Forme juridique</label>
                                <select name="forme_juridique" id="forme_juridique" class="form-control" >
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="SARL" {{ old('forme_juridique',$projets->forme_juridique) == 'SARL' ? 'selected' : '' }}>SARL
                                    </option>
                                    <option value="SA" {{ old('forme_juridique',$projets->forme_juridique) == 'SA' ? 'selected' : '' }}>SA</option>
                                    <option value="SNC" {{ old('forme_juridique',$projets->forme_juridique) == 'SNC' ? 'selected' : '' }}>SNC</option>
                                    <option value="Entreprise Individuelle" {{ old('forme_juridique',$projets->forme_juridique) == 'Entreprise Individuelle' ? 'selected' : '' }}>Entreprise Individuelle</option>

                                </select>
                                @error('forme_juridique')
                                <small class="text-danger">{{ $message }}</small>
                                 @enderror
                            </div>
                            <div class="mb-3">
                                <label for="plan_affaires">Plan d'affaires</label>
                                <input type="file" name="plan_affaires" class="form-control" id="plan_affaires" value="{{old('plan_affaires',$projets->plan_affaires)}}">
                                @error('plan_affaires')
                                <small class="text-danger">{{ $message }}</small>
                                 @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Modifier</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
