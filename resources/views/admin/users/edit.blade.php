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
                        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}" class="text-info">Utilisateurs</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-edit mr-2"></i>Editer un utilisateur</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.users.update',$user->id)}}">

                                    @csrf
                                    @method('PUT')

                                    <div class="form-row">

                                        <div class="col-lg-4 mb-3">
                                            <label for="civility"><i class="fas fa-user mr-1"></i>Civilit?? <span class="text-danger">*</span></label>
                                            <select id="civility" name="civility" type="text" class="custom-select">
                                                <option value="Mr" {{$user->civility == 'Mr' ? 'selected' : ''}}>Mr</option>
                                                <option value="Mme" {{$user->civility == 'Mme' ? 'selected' : ''}}>Mme</option>
                                            </select>
                                            @error('civility')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="first_name"><i class="fas fa-user mr-1"></i>Nom <span class="text-danger">*</span></label>
                                            <input id="first_name" name="first_name" type="text" value="{{old('first_name',$user->first_name)}}" class="form-control" placeholder="Nom"/>
                                            @error('first_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="last_name"><i class="fas fa-user mr-1"></i>Pr??nom <span class="text-danger">*</span></label>
                                            <input id="last_name" name="last_name" type="text" value="{{old('last_name',$user->last_name)}}" class="form-control" placeholder="Pr??nom"/>
                                            @error('last_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="phone"><i class="fas fa-phone-alt mr-1"></i>Num??ro de t??l??phone <span class="text-danger">*</span></label>
                                            <input id="phone" name="phone" type="text" value="{{old('phone',$user->phone)}}" class="form-control @error('phone') is-invalid @enderror" placeholder="Num??ro de t??l??phone"/>
                                            @error('phone')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="mobile"><i class="fas fa-mobile-alt mr-1"></i>Mobile</label>
                                            <input id="mobile" name="mobile" type="text" value="{{@old('mobile',$user->mobile)}}" class="form-control" placeholder="Mobile"/>
                                            @error('mobile')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="email"><i class="fas fa-envelope mr-1"></i>Adresse email <span class="text-danger">*</span></label>
                                            <input id="email" name="email" type="text" value="{{@old('email',$user->email)}}" class="form-control" placeholder="Adresse email"/>
                                            @error('email')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="password"><i class="fas fa-lock mr-1"></i>Nouveau mot de passe <span class="text-danger">*</span></label>
                                            <input id="password" name="password" type="password" class="form-control" placeholder="Nouveau mot de passe"/>
                                            @error('password')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="password_confirmation"><i class="fas fa-lock mr-1"></i>Confirmation du nouveau mot de passe <span class="text-danger">*</span></label>
                                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirmation du nouveau mot de passe"/>
                                        </div>

                                        <x-forms.address-input :address="$user->address" :latitude="$user->latitude" :longitude="$user->longitude"/>


                                        <div class="col-lg-12 mb-3">
                                            <label for="observation"><i class="fas fa-list-alt mr-1"></i>Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation',$user->observation)}}</textarea>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.users.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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



