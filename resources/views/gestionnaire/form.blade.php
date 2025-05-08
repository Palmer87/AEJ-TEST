@extends('admin.base')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Inscription Promoteur
                    <a href="{{ url('/') }}" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form class="vstack gap-3" action="{{ route('gestionnaires.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'name',
                            'label' => 'Nom',
                            'value' => old('name')
                        ])

                    </div>

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'email',
                            'label' => 'Adresse email',
                            'type' => 'email',
                            'value' => old('email')
                        ])
                    </div>

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'password',
                            'label' => 'Mot de passe',
                            'type' => 'password',
                        ])

                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'password_confirmation',
                            'label' => 'Confirmation mot de passe',
                            'type' => 'password',
                        ])
                    </div>

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'poste',
                            'label' => 'Poste occupé',
                            'value' => old('poste'),
                        ])

                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'telephone',
                            'type'=>'phone',
                            'value' => old('telephone'),
                            'label' => 'Numéro de téléphone',

                        ])
                    </div>

                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'adresse',
                            'label' => 'Adresse',
                            'value' => old('adresse'),

                        ])
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                Créer un gestionnaire
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
