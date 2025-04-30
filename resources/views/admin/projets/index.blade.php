@extends('admin.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des projets</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Type du pojet</th>
                                <th>La forme juridique</th>
                                <th>Etat du projet</th>
                                <th>Plan d'affaires</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projets as $projet)
                            <tr>
                                <td>{{ $projet->titre }}</td>
                                <td>{{ $projet->type_projet }}</td>
                                <td>{{ $projet->forme_juridique }}</td>
                                <td>{{ $projet->etat }}</td>
                                <td>
                                    @if($projet->plan_affaires)
                                        <a href="{{ asset('storage/'.$projet->plan_affaires) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-info" onclick="event.stopPropagation()">
                                            <i class="fas fa-file-pdf"></i> Voir PDF
                                        </a>
                                    @else
                                        <span class="text-muted">Aucun fichier</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.projets.edit', $projet->id) }}" class="btn btn-primary">Modifier</a>
                                    <form action="{{ route('admin.projets.destroy', $projet->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
