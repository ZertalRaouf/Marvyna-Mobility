@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}" class="text-info">Utilisateurs</a></li>
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
                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-user mr-1"></i>Civilité :</label>
                                        <p class="text-capitalize">Mr</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-user mr-2"></i>Nom et prénom :</label>
                                        <p class="text-capitalize">{{$student->first_name}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-user mr-2"></i>Parents :</label>
                                        <p class="text-capitalize">
                                            @foreach($student->users as $parent)
                                                <span>
                                                    {{$parent->name}}
                                                </span>
                                            @endforeach
                                        </p>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label><i class="fas fa-list-alt mr-2"></i>Observation :</label>
                                        <p class="text-capitalize">Ceci est une observation</p>
                                    </div>

                                </div>

                                <hr>

                                <div class="text-right">
                                    <a href="{{route('admin.students.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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


