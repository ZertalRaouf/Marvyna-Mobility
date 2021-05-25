@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.drivers.index')}}" class="text-info">Chauffeurs</a></li>
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
                                        <p class="text-capitalize">{{$driver->civility}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-user mr-2"></i>Nom et prénom :</label>
                                        <p class="text-capitalize">{{$driver->name}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-phone-alt mr-2"></i>Numéro de téléphone :</label>
                                        <p class="text-capitalize">{{$driver->phone}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-mobile-alt mr-2"></i>Mobile :</label>
                                        <p class="text-capitalize">{{$driver->mobile ?? 'Non renseigné'}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-envelope mr-2"></i>Adresse email :</label>
                                        <p class="text-lowercase">{{$driver->email}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-calendar-alt mr-2"></i>Date de naissance :</label>
                                        <p class="text-lowercase">{{$driver->birth_date}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-globe mr-2"></i>Nationalité :</label>
                                        <p class="text-lowercase">{{$driver->nationality}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-map-pin mr-2"></i>Lieu de naissance :</label>
                                        <p class="text-lowercase">{{$driver->place_of_birth}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-barcode mr-2"></i>Numéro de sécurité :</label>
                                        <p class="text-capitalize">{{$driver->security_number}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-barcode mr-2"></i>Numéro de permis :</label>
                                        <p class="text-capitalize">{{$driver->licence_number}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-calendar-alt mr-2"></i>Date d'expiration du permis :</label>
                                        <p class="text-capitalize">{{$driver->licence_expiration_date}}</p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label><i class="fas fa-circle mr-2"></i>Disponibilité :</label>
                                        <p class="text-capitalize">
                                            <span class="badge {{$driver->is_available ? 'bg-success' : 'bg-danger'}}">
                                                {{$driver->is_available ? 'Disponible' : 'Absent'}}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label><i class="fas fa-map-marker-alt mr-2"></i>Adresse :</label>
                                        <p class="text-capitalize">{{$driver->address}}</p>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label><i class="fas fa-list-alt mr-2"></i>Observation :</label>
                                        <p class="text-capitalize">{{$driver->observation ?? 'aucune'}}</p>
                                    </div>

                                </div>

                                <hr>

                                <div class="text-right">
                                    <a href="{{route('admin.drivers.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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


