@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.vehicules.index')}}" class="text-info">Véhicules</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-plus-circle mr-2"></i>Ajouter un véhicule</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('admin.vehicules.store')}}">

                                    @csrf

                                    <div class="form-row">

                                        <div class="col-lg-6 mb-3">
                                            <label for="code"><i class="fas fa-user mr-1"></i>Code <span class="text-danger">*</span></label>
                                            <input id="code" name="code" type="text" value="{{@old('code')}}" class="form-control" placeholder="Code"/>
                                            @error('code')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="type"><i class="fas fa-user mr-1"></i>Type <span class="text-danger">*</span></label>
                                            <select id="type" name="civility" type="text" class="custom-select">
                                                <option value="1">type 1</option>
                                                <option value="2">type 2</option>
                                            </select>
                                            @error('type')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="matriculation"><i class="fas fa-user mr-1"></i>Immatriculation <span class="text-danger">*</span></label>
                                            <input id="matriculation" name="code" type="text" value="{{@old('matriculation')}}" class="form-control" placeholder="Immatriculation"/>
                                            @error('matriculation')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="matriculation_date"><i class="fas fa-user mr-1"></i>Date d'immatriculation <span class="text-danger">*</span></label>
                                            <input id="matriculation_date" name="matriculation_date" type="date" value="{{@old('matriculation_date')}}" class="form-control" placeholder="Date d'immatriculation" data-inputmask="'alias':'dd/mm/yyyy'" data-mask/>
                                            @error('matriculation_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="first_circulation_date"><i class="fas fa-user mr-1"></i>Première date de circulation <span class="text-danger">*</span></label>
                                            <input id="first_circulation_date" name="first_circulation_date" type="date" value="{{@old('first_circulation_date')}}" class="form-control" placeholder="Première date de circulation"/>
                                            @error('first_circulation_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="is_rentable"><i class="fas fa-user mr-1"></i>Louable <span class="text-danger">*</span></label>
                                            <select id="is_rentable" name="is_rentable" type="text" class="custom-select">
                                                <option value="1">Oui</option>
                                                <option value="2">Non</option>
                                            </select>
                                            @error('is_rentable')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="brand"><i class="fas fa-user mr-1"></i>Marque <span class="text-danger">*</span></label>
                                            <input id="brand" name="brand" type="text" value="{{@old('brand')}}" class="form-control" placeholder="Marque"/>
                                            @error('brand')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="model"><i class="fas fa-user mr-1"></i>Modele <span class="text-danger">*</span></label>
                                            <input id="model" name="model" type="text" value="{{@old('model')}}" class="form-control" placeholder="Modele"/>
                                            @error('model')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="motorization"><i class="fas fa-user mr-1"></i>Motorisation <span class="text-danger">*</span></label>
                                            <input id="motorization" name="motorization" type="text" value="{{@old('motorization')}}" class="form-control" placeholder="Motorisation"/>
                                            @error('motorization')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="fuel"><i class="fas fa-user mr-1"></i>Carburant <span class="text-danger">*</span></label>
                                            <input id="fuel" name="fuel" type="text" value="{{@old('fuel')}}" class="form-control" placeholder="Carburant"/>
                                            @error('fuel')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="color"><i class="fas fa-user mr-1"></i>Couleur <span class="text-danger">*</span></label>
                                            <input id="color" name="color" type="text" value="{{@old('color')}}" class="form-control" placeholder="Couleur"/>
                                            @error('color')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="number_of_places"><i class="fas fa-user mr-1"></i>Nombre de places <span class="text-danger">*</span></label>
                                            <input id="number_of_places" name="number_of_places" type="number" value="{{@old('number_of_places')}}" class="form-control" placeholder="Nombre de places"/>
                                            @error('number_of_places')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="tax_horses"><i class="fas fa-user mr-1"></i>Chevaux fiscaux <span class="text-danger">*</span></label>
                                            <input id="tax_horses" name="tax_horses" type="text" value="{{@old('tax_horses')}}" class="form-control" placeholder="Chevaux fiscaux"/>
                                            @error('tax_horses')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="serial_number"><i class="fas fa-user mr-1"></i>Numéro de série <span class="text-danger">*</span></label>
                                            <input id="serial_number" name="serial_number" type="text" value="{{@old('serial_number')}}" class="form-control" placeholder="Numéro de série"/>
                                            @error('serial_number')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="initial_number_of_km"><i class="fas fa-user mr-1"></i>Kilométrage initial <span class="text-danger">*</span></label>
                                            <input id="initial_number_of_km" name="initial_number_of_km" type="text" value="{{@old('initial_number_of_km')}}" class="form-control" placeholder="Kilométrage initial"/>
                                            @error('initial_number_of_km')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="mode_of_aquisition"><i class="fas fa-user mr-1"></i>Mode d'aquisition <span class="text-danger">*</span></label>
                                            <input id="mode_of_aquisition" name="mode_of_aquisition" type="text" value="{{@old('mode_of_aquisition')}}" class="form-control" placeholder="Mode d'aquisition"/>
                                            @error('mode_of_aquisition')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="key_double_location"><i class="fas fa-user mr-1"></i>Adresse du double des clés <span class="text-danger">*</span></label>
                                            <input id="key_double_location" name="key_double_location" type="text" value="{{@old('key_double_location')}}" class="form-control" placeholder="Adresse du double des clés"/>
                                            @error('key_double_location')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="photos"><i class="fas fa-user mr-1"></i>Photos <span class="text-danger">*</span></label>
                                            <input id="photos" name="photos" type="file" value="{{@old('photos')}}" class="form-control" placeholder="Photos"/>
                                            @error('photos')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="observation"><i class="fas fa-list-alt mr-1"></i>Observation</label>
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
                                        <a href="{{route('admin.vehicules.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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



