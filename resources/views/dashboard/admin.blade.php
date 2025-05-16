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
            <div class="col-xl-3 col-md-6 mb-4">
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
            <div class="col-xl-3 col-md-6 mb-4">
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
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Projet validés
                                    </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                <i class="fa-solid fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
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
        <div class="row">

    </div>
</div>


@endsection


