@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.actualities.index')}}" class="text-info">Actualités</a></li>
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

                                    <div class="col-lg-6 mb-3">
                                        <label>Titre :</label>
                                        <p class="text-capitalize">{{$actuality->title}}</p>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label>Date :</label>
                                        <p>{{$actuality->created_at->format('d-m-Y')}}</p>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label>Visibilité :</label>
                                        <p>
                                            <span class="badge px-2 {{ $actuality->is_visible == '1' ? 'bg-success' : 'bg-danger' }}">
                                                @if($actuality->is_visible == '1')
                                                    Publié
                                                @else
                                                    Non publié
                                                @endif
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label>Contenu :</label>
                                        <p>{{$actuality->content}}</p>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label>Image :</label>
                                        <p>img</p>
                                    </div>

                                </div>

                                <hr>

                                <div class="text-right">
                                    <a href="{{route('admin.actualities.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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


