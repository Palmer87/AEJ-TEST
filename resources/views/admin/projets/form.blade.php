@extends('admin.base')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Ajouter une propriété
                    <a href="{{ url('admin/projet') }}" class="btn btn-danger float-end">Retour</a>
                </h4>
            </div>
            <div class="card-body">
                <form class="vstack gap-3" action="{{ route($projet->exists ? 'admin.projet.update':'admin.projet.store',$projet)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($property->exists? 'PUT':'POST')
                    <div class="row">
                        @include('shared.input',['class'=>'col','name'=>'nom','label'=>'Titre','value'=>$projet->nom])
                        @include('shared.input',['class'=>'col','name'=>'type_projet','label'=>'Type du projet','value'=>$projet->type_projet,'type'=>'select','options'=>["EN DÉVELOPPEMENT",'EN CREATION']])
                    </div>

                    <div class="row">

                        @include('shared.input',['class'=>'col','name'=>'forme_juridique','label'=>'Forme juridique','value'=>$projet->forme_juridique])
                        @include('shared.input',['class'=>'col','name'=>'plan_affaires','label'=>'Business plan','value'=>$projet->rooms,'type'=>'file'])
                        @include('shared.input',['class'=>'col','name'=>'etat','label'=>'Etat','value'=>$projet->etat,'type'=>'select','options'=>['En cours','Terminé']])
                    </div>


                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                @if ($projet->exists)
                                Modifier
                                @else
                                Ajouter
                                @endif
                                </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
