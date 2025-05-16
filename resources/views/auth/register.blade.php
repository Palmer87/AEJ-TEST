

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
<div class="row">
    <div class="col-md-6 align-content-center">
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
                <form class="vstack gap-3" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'name',
                            'label' => 'Nom',
                            'value' => old('name')
                        ])

                         @include('shared.input', [
                                'class' => 'col-md-6',
                                'name' => 'prenom',
                                'label' => 'Prénom',
                                'value' => old('prenom')
                            ])
                        </div>
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
                            'name' => 'date_naissance',
                            'label' => 'Date de naissance',
                            'type' => 'date',
                            'value' => old('date_naissance')
                        ])

                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'lieu_naissance',
                            'label' => 'Lieu de naissance',
                            'value' => old('lieu_naissance')
                        ])
                    </div>

                    <div class="row">
                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'numero_cni',
                            'label' => 'Numéro CNI',
                            'value' => old('numero_cni')
                        ])

                        @include('shared.input', [
                            'class' => 'col',
                            'name' => 'cni_image',
                            'label' => 'Image de la CNI',
                            'type' => 'file',
                        ])
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                S'inscrire
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
