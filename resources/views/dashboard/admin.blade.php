@extends('base')
@section('title','Dashboard')
@section('content')

       <!-- Main Content -->
       <div class="container-fluid px-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
            @if(auth()->user()->role=='admin')
            <a href="{{route('gestionnaires.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Ajouter un nouveau gestionnaire
            </a>
            @endif

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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$projets->count()}}
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$projets->where('status', 'en attente')->count() ?? 0 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-business-time fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col "style="flex: 0 0 20%; max-width: 20%; max-height:100px">
                <div class="card stat-card success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Projet validés
                                    </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{$projets->where('status', 'validé')->count() ?? 0 }}
                                </div>
                                <i class="fa-solid fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col"style="flex: 0 0 20%; max-width: 20%; max-height:100px">
                <div class="card stat-card danger h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Projts rejetés
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$projets->where('status', 'rejeté')->count() ?? 0
                                }}</div>
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
  {{-- Graphique Camembert --}}
  <div class="container py-4">
    <div class="col"style="flex: 0 0 40%; max-width: 40%; max-height:200px">
        <div class="card   h-100 py-2">
            <div class="card-body">
                <h2 class="text-xl font-semibold mb-4">Statistiques des statuts de projet</h2>
                <canvas id="projectStatusChart" height="120"></canvas>
            </div>
        </div>
    </div>


    </div>
</div>


@endsection


