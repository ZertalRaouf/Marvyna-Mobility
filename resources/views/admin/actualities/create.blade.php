@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.actualities.index')}}" class="text-info">Actualités</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-plus-circle mr-2"></i>Ajouter une actualité</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('admin.actualities.store')}}" enctype="multipart/form-data" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-row">

                                        <div class="col-lg-6 mb-3">
                                            <label for="title">Titre <span class="text-danger">*</span></label>
                                            <input id="title" name="title" type="text" value="{{@old('title')}}" class="form-control" placeholder="Titre"/>
                                            @error('title')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="is_visible">Visibilité <span class="text-danger">*</span></label>
                                            <select id="is_visible" name="is_visible" type="text" class="custom-select">
                                                <option value="1">Publié</option>
                                                <option value="2">Non publié</option>
                                            </select>
                                            @error('is_visible')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="content">Contenu <span class="text-danger">*</span></label>
                                            <textarea id="content" name="content" rows="3" class="form-control" placeholder="Contenu">{{old('content')}}</textarea>
                                            @error('content')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="image">Image</label>
                                            <input id="image" name="image" type="file" value="{{@old('image')}}" class="form-control" placeholder="Image"/>
                                            @error('image')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.actualities.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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



