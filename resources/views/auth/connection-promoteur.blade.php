@extends('')
@section('title', 'inscription')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Inscription Promoteur</h2>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('promoteur.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prénoms</label>
            <input type="text" name="prenoms" class="form-control" value="{{ old('prenoms') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="motDePasse" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="motDePasse_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lieu de naissance</label>
            <input type="text" name="lieu_naissance" class="form-control" value="{{ old('lieu_naissance') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Numéro CNI</label>
            <input type="text" name="numero_cni" class="form-control" value="{{ old('numero_cni') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image CNI</label>
            <input type="file" name="cni_image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
@endsection


