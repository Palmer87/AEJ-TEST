@extends('base')
@section('title', 'se connecter')
@section('content')
<div class="container my-4 d-flex justify-content-center">
    <div class="card shadow rounded" style="max-width: 32rem; width: 100%;">
      <div class="card-body">
        <form action="{{ route('tologin') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Se connecter</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection

