@extends('base')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Inscription d'un nouveau gestionnaire
                    <a href="{{ url('/resources/views/dashboard/admin.blade.php') }}" class="btn btn-danger float-end">Retour</a>
                </h4>
                </div>
                        @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif





            <div class="card-body">

>
                <form class="vstack gap-3" action="{{ route('gestionnaires.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'name',
                            'label' => 'Nom',
                            'value' => old('name')
                        ])
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'prenom',
                            'label' => 'Prénom',
                            'value' => old('prenom')
                        ])


                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Mot de passe & confirmation -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="password_confirmation" class="form-label">Confirmation mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <!-- Poste & téléphone -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="poste" class="form-label">Poste occupé</label>
                            <input type="text" name="poste" id="poste" class="form-control" value="{{ old('poste') }}">
                            @error('poste')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="telephone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}">
                            @error('telephone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Adresse -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}">
                            @error('adresse')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Créer un gestionnaire</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
