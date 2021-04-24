@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.drivers.index')}}" class="text-info">Chauffeurs</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-plus-circle mr-2"></i>Ajouter un chauffeur</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('admin.drivers.store')}}">

                                    @csrf

                                    <div class="form-row">

                                        <div class="col-lg-6 mb-3">
                                            <label for="civility"><i class="fas fa-user mr-1"></i>Civilité <span class="text-danger">*</span></label>
                                            <select id="civility" name="civility" type="text" class="custom-select">
                                                <option value="1">Mr</option>
                                                <option value="2">Mme</option>
                                            </select>
                                            @error('civility')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="name"><i class="fas fa-user mr-1"></i>Nom et prénom <span class="text-danger">*</span></label>
                                            <input id="name" name="name" type="text" value="{{@old('name')}}" class="form-control" placeholder="Nom et prénom"/>
                                            @error('name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="phone"><i class="fas fa-phone-alt mr-1"></i>Numéro de téléphone <span class="text-danger">*</span></label>
                                            <input id="phone" name="phone" type="text" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" placeholder="Numéro de téléphone"/>
                                            @error('phone')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="mobile"><i class="fas fa-mobile-alt mr-1"></i>Mobile <span class="text-danger">*</span></label>
                                            <input id="mobile" name="mobile" type="text" value="{{@old('mobile')}}" class="form-control" placeholder="Mobile"/>
                                            @error('mobile')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="email"><i class="fas fa-envelope mr-1"></i>Adresse email <span class="text-danger">*</span></label>
                                            <input id="email" name="email" type="text" value="" class="form-control" placeholder="Adresse email"/>
                                            @error('email')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="password"><i class="fas fa-lock mr-1"></i>Mot de passe <span class="text-danger">*</span></label>
                                            <input id="password" name="password" type="password" class="form-control" placeholder="Mot de passe"/>
                                            @error('password')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="password_confirmation"><i class="fas fa-lock mr-1"></i>Confirmation du mot de passe <span class="text-danger">*</span></label>
                                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirmation du mot de passe"/>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="address"><i class="fas fa-map-marker-alt mr-1"></i>Adresse <span class="text-danger">*</span></label>
                                            <textarea id="address" name="address" type="text" rows="3" class="form-control" placeholder="Adresse">{{old('address')}}</textarea>
                                            @error('address')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="observation"><i class="fas fa-list-alt mr-1"></i>Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation')}}</textarea>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.drivers.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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



