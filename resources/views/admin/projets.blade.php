@extends('base')
@section('content')

    <div class="container py-4">
        <h1 class="mb-4 " style="font-size: 3em" >Tableau  des projets</h1>

        <div class="card p-4">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un projet...">
                </div>
                <div class="col-md-3">
                    <select id="statusFilter" class="form-select">
                        <option value="">Tous les statuts</option>
                        <option value="Validé">Validé</option>
                        <option value="Rejeté">Rejeté</option>
                        <option value="En attente">En attente</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="projectTable">
                    <thead class="table-success">
                        <tr >
                            <th>ID</th>
                            <th onclick="sortTable(0)">Nom du projet ⬍</th>
                            <th onclick="sortTable(1)">Promoteur ⬍</th>
                            <th onclick="sortTable(2)">Date ⬍</th>
                            <th onclick="sortTable(4)">Statut ⬍</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projets as $projet)
                            <tr>
                                <td>{{ $projet->id }}</td>
                                <td>{{ $projet->titre }}</td>
                                <td>{{ $projet->promoteur->user->name }}</td>
                                <td>{{ $projet->created_at->format('d-m-Y') }}</td>
                                <td>
                                    @if ($projet->status === 'en attente')
                                        <span class="status-badge status-attente">En attente</span>
                                    @elseif ($projet->status === 'validé')
                                        <span class="status-badge status-validé">Validé</span>
                                    @elseif ($projet->status === 'rejeté')
                                        <span class="status-badge status-rejeté">Rejeté</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($projet->status === 'en attente')
                                    <div class="d-flex align-items-start gap-2">
                                        <!-- Bouton Valider -->
                                        <form action="{{ route('projets.valider', $projet) }}" method="POST" class="me-2">
                                            @csrf
                                            <button type="submit" class="btn btn-sm  shadow-sm" style="background-color: gr">
                                                <i class="fas fa-check-circle me-1"></i> Valider
                                            </button>
                                        </form>

                                            <div>
                                                <a href="#rejeterForm{{ $projet->id }}" data-bs-target="collapse" class="btn btn-sm btn-danger">Rejeter</a>
                                                <div class="collapse mt-2" id="rejeterForm{{ $projet->id }}">
                                                    <form action="{{ route('projets.rejeter', $projet) }}" method="POST">
                                                        @csrf
                                                        <textarea name="justification" class="form-control mb-2" rows="2" required placeholder="Motif du rejet"></textarea>
                                                        <button type="submit" class="btn btn-sm btn-danger">Confirmer le rejet</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($projet->status === 'validé'||$projet->status ==='rejeté'&&$projet->plan_affaires)
                                        <a href="{{ route('projets.show', $projet) }}" class="btn btn-sm btn-info">Voir</a>
                                        <a href="{{ asset('storage/pdfs/decision_projet_'. $projet->id .'.pdf'|'storage/pdfs/decision_projet_'.$projet->titre.'pdf') }}"
                                            download class="btn btn-outline-secondary btn-sm">
                                            Télécharger PDF
                                         </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach


                        <!-- Ajoute plus de projets ici -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
