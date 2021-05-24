@extends('admin.layouts.app')

@push('css')

@endpush

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.establishments.index')}}" class="text-info">Établissements</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-info">Editer</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-edit mr-2"></i>Editer un etablissement</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.establishments.update',$establishment->id)}}">

                                    @csrf
                                    @method('PUT')

                                    <div class="form-row">

                                        <div class="col-lg-4 mb-3">
                                            <label for="name"><i class="fas fa-school mr-1"></i>Nom de l'établissement <span class="text-danger">*</span></label>
                                            <input id="name" name="name" type="text" value="{{@old('name',$establishment->name)}}" class="form-control" placeholder="Nom de l'établissement"/>
                                            @error('name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="phone"><i class="fas fa-phone-alt mr-1"></i>Numéro de téléphone <span class="text-danger">*</span></label>
                                            <input id="phone" name="phone" type="text" value="{{@old('phone',$establishment->phone)}}" class="form-control" placeholder="Numéro de téléphone"/>
                                            @error('phone')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="email"><i class="fas fa-envelope mr-1"></i>Adresse email <span class="text-danger">*</span></label>
                                            <input id="email" name="email" type="text" value="{{@old('email',$establishment->email)}}" class="form-control" placeholder="Adresse email"/>
                                            @error('email')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <x-forms.address-input :address="$establishment->address" :latitude="$establishment->latitude" :longitude="$establishment->longitude"/>


                                        <div class="col-lg-12 mb-3">
                                            <label for="observation"><i class="fas fa-list-alt mr-1"></i>Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation',$establishment->observation)}}</textarea>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.establishments.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
                                            Annuler
                                        </a>
                                        <button class="btn btn-info my-3" type="submit" style="width: 135px">
                                            Modifier
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



