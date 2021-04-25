@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.collaborators.index')}}" class="text-info">Collaborateurs</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-info">Détails</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="content">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-4 mb-3">
                                        <label>Nom du collaborateur :</label>
                                        <p class="text-capitalize">{{$collaborator->name}}</p>
                                    </div>

                                    <div class="col-lg-4 mb-3">
                                        <label>Adresse email :</label>
                                        <p>{{$collaborator->email}}</p>
                                    </div>

                                    <div class="col-lg-4 mb-3">
                                        <label>Numéro de téléphone :</label>
                                        <p>{{$collaborator->phone}}</p>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label>Observation :</label>
                                        <p>{{$collaborator->observation}}</p>
                                    </div>

                                </div>

                                <hr>

                                <div class="text-right">
                                    <a href="{{route('admin.collaborators.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
                                        Retour
                                    </a>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </section>
@endsection


