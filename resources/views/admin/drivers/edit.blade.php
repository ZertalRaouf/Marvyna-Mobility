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
                        <li class="breadcrumb-item"><a href="{{route('admin.drivers.index')}}" class="text-info">Chauffeurs</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-edit mr-2"></i>Editer un chauffeur</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.drivers.update',$driver->id)}}">

                                    @csrf
                                    @method('PUT')

                                    <div class="form-row">

                                        <div class="col-lg-4 mb-3">
                                            <label for="civility"><i class="fas fa-user mr-1"></i>Civilité <span class="text-danger">*</span></label>
                                            <select id="civility" name="civility" type="text" class="custom-select">
                                                <option value="Mr" {{$driver->civility == 'Mr' ? 'selected' : ''}}>Mr</option>
                                                <option value="Mme" {{$driver->civility == 'Mme' ? 'selected' : ''}}>Mme</option>
                                            </select>
                                            @error('civility')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="last_name"><i class="fas fa-user mr-1"></i>Nom <span class="text-danger">*</span></label>
                                            <input id="last_name" name="last_name" type="text" value="{{@old('last_name',$driver->last_name)}}" class="form-control" placeholder="Nom et prénom"/>
                                            @error('last_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="first_name"><i class="fas fa-user mr-1"></i>Prénom <span class="text-danger">*</span></label>
                                            <input id="first_name" name="first_name" type="text" value="{{@old('first_name',$driver->first_name)}}" class="form-control" placeholder="Nom et prénom"/>
                                            @error('first_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="phone"><i class="fas fa-phone-alt mr-1"></i>Numéro de téléphone <span class="text-danger">*</span></label>
                                            <input id="phone" name="phone" type="text" value="{{old('phone',$driver->phone)}}" class="form-control @error('phone') is-invalid @enderror" placeholder="Numéro de téléphone"/>
                                            @error('phone')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="mobile"><i class="fas fa-mobile-alt mr-1"></i>Mobile <span class="text-danger">*</span></label>
                                            <input id="mobile" name="mobile" type="text" value="{{old('mobile', $driver->mobile)}}" class="form-control" placeholder="Mobile"/>
                                            @error('mobile')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="birth_date"><i class="fas fa-calendar-alt mr-1"></i>Date de naissance <span class="text-danger">*</span></label>
                                            <input id="birth_date" name="birth_date" type="date" value="{{$driver->birth_date}}" class="form-control"/>
                                            @error('birth_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="nationality"><i class="fas fa-globe mr-1"></i>Nationalité <span class="text-danger">*</span></label>
                                            <input id="nationality" name="nationality" type="text" value="{{$driver->nationality}}" class="form-control" placeholder="Nationalité"/>
                                            @error('nationality')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="place_of_birth"><i class="fas fa-map-pin mr-1"></i>Lieu de naissance <span class="text-danger">*</span></label>
                                            <input id="place_of_birth" name="place_of_birth" type="text" value="{{$driver->place_of_birth}}" class="form-control" placeholder="Lieu de naissance"/>
                                            @error('place_of_birth')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="security_number"><i class="fas fa-barcode mr-1"></i>Numero de securité <span class="text-danger">*</span></label>
                                            <input id="security_number" name="security_number" type="text" value="{{$driver->security_number}}" class="form-control" placeholder="Numero de securité"/>
                                            @error('security_number')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="licence_number"><i class="fas fa-barcode mr-1"></i>Numéro de permis <span class="text-danger">*</span></label>
                                            <input id="licence_number" name="licence_number" type="text" value="{{$driver->licence_number}}" class="form-control" placeholder="Numéro de permi"/>
                                            @error('licence_number')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="licence_expiration_date"><i class="fas fa-calendar-alt mr-1"></i>Date d'expiration du permis <span class="text-danger">*</span></label>
                                            <input id="licence_expiration_date" name="licence_expiration_date" type="date" value="{{$driver->licence_expiration_date}}" class="form-control"/>
                                            @error('licence_expiration_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="photo"><i class="fas fa-file mr-1"></i>Photo <span class="text-danger">*</span></label>
                                            <input id="photo" name="photo" type="file" class="form-control" placeholder="Photo"/>
                                            @error('photo')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="licence_photo"><i class="fas fa-file mr-1"></i>Photo du permis <span class="text-danger">*</span></label>
                                            <input id="licence_photo" name="licence_photo" type="file" class="form-control" placeholder="Photo"/>
                                            @error('licence_photo')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="email"><i class="fas fa-envelope mr-1"></i>Adresse email <span class="text-danger">*</span></label>
                                            <input id="email" name="email" type="text" value="{{old('email',$driver->email)}}" class="form-control" placeholder="Adresse email"/>
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

                                        <x-forms.address-input :address="$driver->address" :latitude="$driver->latitude" :longitude="$driver->longitude"/>


                                        <div class="col-lg-6 mb-3">
                                            <label for="is_available"><i class="fas fa-circle mr-1"></i>Disponibilité</label>
                                            <input id="is_available" name="is_available" type="checkbox" {{$driver->is_available ? 'checked' : ''}}/>
                                            @error('is_available')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="observation"><i class="fas fa-list-alt mr-1"></i>Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation',$driver->observation)}}</textarea>
                                        </div>

                                    </div>


                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.drivers.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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



