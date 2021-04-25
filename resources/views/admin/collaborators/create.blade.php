@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.collaborators.index')}}" class="text-info">Collaborateurs</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-info">Créer</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-plus-circle mr-2"></i>Ajouter un collaborateur</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('admin.collaborators.store')}}" enctype="multipart/form-data" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-row">

                                        <div class="col-lg-4 mb-3">
                                            <label for="name">Nom du collaborateur <span class="text-danger">*</span></label>
                                            <input id="name" name="name" type="text" value="{{@old('name')}}" class="form-control" placeholder="Nom du collaborateur"/>
                                            @error('name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="email">Adresse email <span class="text-danger">*</span></label>
                                            <input id="email" name="email" type="email" value="{{@old('email')}}" class="form-control" placeholder="Adresse email"/>
                                            @error('email')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="phone">Numéro de téléphone <span class="text-danger">*</span></label>
                                            <input id="phone" name="phone" type="number" value="{{@old('phone')}}" class="form-control" placeholder="Numéro de téléphone"/>
                                            @error('phone')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="content">Observation <span class="text-danger">*</span></label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation')}}</textarea>
                                            @error('observation')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.collaborators.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
                                            Annuler
                                        </a>
                                        <button class="btn btn-info my-3" type="submit" style="width: 135px">
                                            Ajouter
                                        </button>
                                    </div>

                                </form>
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

@push('js')

@endpush



