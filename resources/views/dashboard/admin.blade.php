@extends('base')
@section('title','Dashboard')
@section('content')

       <!-- Main Content -->
       <div class="container-fluid px-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
            <a href="{{route('gestionnaires.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Ajouter un nouveau gestionnaire
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col" style="flex: 0 0 20%; max-width: 20%;max-height:100px">
                <div class="card stat-card primary h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Utilisateurs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user->count()??0}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col" style="flex: 0 0 20%; max-width: 20%; max-height:100px">
                <div class="card stat-card primary h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total des projets</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$projets->count()??0}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="flex: 0 0 20%; max-width: 20%; max-height:100px">
                <div class="card stat-card warning h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Projets en Attent</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$projets->where('status', 'en attente')->count()??0}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-business-time fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card stat-card success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Projet validés
                                    </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{$projets->where('status', 'validé')->count()??0}}
                                </div>
                                <i class="fa-solid fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card stat-card danger h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Alertes
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Tables -->
        <div class="container py-4">
            <h2 class="mb-4">Tableau de bord des projets</h2>

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
                                <th>Statut</th>
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
                                            <div class="d-flex align-items-start gap-2">  <!-- Ajout d'un conteneur flex -->
                                                <form action="{{ route('projets.valider', $projet) }}" method="POST" class="me-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Valider</button>
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
                                        @else
                                            <em class="text-muted text-center">Terminé</em>
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

    </div>
</div>


@endsection


