@extends('base')
@section('title', 'Connexion')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Connexion</h4>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse Email</label>
                            <input type="email" class="form-control" name="email" id="email" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div@extends('base')
                        @section('title', 'Connexion')

                        @section('content')
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-primary text-white text-center">
                                            <h4>Connexion</h4>
                                        </div>
                                        <div class="card-body">
                                            @if(session('error'))
                                                <div class="alert alert-danger">{{ session('error') }}</div>
                                            @endif

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Adresse Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" required autofocus>
                                                    @error('email')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Mot de passe</label>
                                                    <input type="password" class="form-control" name="password" id="password" required>
                                                    @error('password')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                                                </div>

                                                <div class="d-grid mb-3">
                                                    <button type="submit" class="btn btn-primary">Se connecter</button>
                                                </div>

                                                <div class="text-center">
                                                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center">
                                            Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endsection>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
