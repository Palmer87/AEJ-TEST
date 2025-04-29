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
                                <th>Nom</th>
                                <th>Type du pojet</th>
                                <th>La forme juridique</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projets as $projet)
                            <tr>
                                <td>{{ $projet->nom }}</td>
                                <td>{{ $projet->type }}</td>
                                <td>{{ $projet->forme_juridique }}</td>
    
                                <td>
                                    <a href="{{ route('projet.edit', $projet->id) }}" class="btn btn-primary">Modifier</a>
                                    <form action="{{ route('projet.destroy', $projet->id) }}" method="POST" style="display: inline-block;">
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
