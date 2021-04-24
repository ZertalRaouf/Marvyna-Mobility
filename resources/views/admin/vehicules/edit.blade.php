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
                        <li class="breadcrumb-item"><a href="{{route('admin.vehicules.index')}}" class="text-info">Véhicules</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-edit mr-2"></i>Editer un véhicule</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.vehicules.update',$vehicule->id)}}">

                                    @csrf
                                    @method('PUT')

                                    <div class="form-row">

                                        <div class="col-lg-4 mb-3">
                                            <label for="code">Code <span class="text-danger">*</span></label>
                                            <input id="code" name="code" type="text" value="{{@old('code',$vehicule->code)}}" class="form-control" placeholder="Code"/>
                                            @error('code')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="type">Type <span class="text-danger">*</span></label>
                                            <select id="type" name="type" type="text" class="custom-select">
                                                <option value="1" {{ $vehicule->type == '1' ? 'selected' : '' }}>type 1</option>
                                                <option value="2" {{ $vehicule->type == '2' ? 'selected' : '' }}>type 2</option>
                                            </select>
                                            @error('type')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="matriculation">Immatriculation <span class="text-danger">*</span></label>
                                            <input id="matriculation" name="matriculation" type="text" value="{{@old('matriculation',$vehicule->matriculation)}}" class="form-control" placeholder="Immatriculation"/>
                                            @error('matriculation')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="matriculation_date">Date d'immatriculation <span class="text-danger">*</span></label>
                                            <input id="matriculation_date" name="matriculation_date" type="date" value="{{@old('matriculation_date',$vehicule->matriculation_date)}}" class="form-control" placeholder="Date d'immatriculation" data-inputmask="'alias':'dd/mm/yyyy'" data-mask/>
                                            @error('matriculation_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="first_circulation_date">Première date de circulation <span class="text-danger">*</span></label>
                                            <input id="first_circulation_date" name="first_circulation_date" type="date" value="{{@old('first_circulation_date',$vehicule->first_circulation_date)}}" class="form-control" placeholder="Première date de circulation"/>
                                            @error('first_circulation_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="is_rentable">Louable <span class="text-danger">*</span></label>
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

                                        <div class="col-lg-4 mb-3">
                                            <label for="brand">Marque <span class="text-danger">*</span></label>
                                            <input id="brand" name="brand" type="text" value="{{@old('brand',$vehicule->brand)}}" class="form-control" placeholder="Marque"/>
                                            @error('brand')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="model">Modele <span class="text-danger">*</span></label>
                                            <input id="model" name="model" type="text" value="{{@old('model',$vehicule->model)}}" class="form-control" placeholder="Modele"/>
                                            @error('model')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <label for="motorization">Motorisation <span class="text-danger">*</span></label>
                                            <input id="motorization" name="motorization" type="text" value="{{@old('motorization',$vehicule->motorization)}}" class="form-control" placeholder="Motorisation"/>
                                            @error('motorization')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <label for="fuel">Carburant <span class="text-danger">*</span></label>
                                            <input id="fuel" name="fuel" type="text" value="{{@old('fuel',$vehicule->fuel)}}" class="form-control" placeholder="Carburant"/>
                                            @error('fuel')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <label for="color">Couleur <span class="text-danger">*</span></label>
                                            <input id="color" name="color" type="text" value="{{@old('color',$vehicule->color)}}" class="form-control" placeholder="Couleur"/>
                                            @error('color')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-3 mb-3">
                                            <label for="number_of_places">Nombre de places <span class="text-danger">*</span></label>
                                            <input id="number_of_places" name="number_of_places" type="number" value="{{@old('number_of_places',$vehicule->number_of_places)}}" class="form-control" placeholder="Nombre de places"/>
                                            @error('number_of_places')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="tax_horses">Chevaux fiscaux <span class="text-danger">*</span></label>
                                            <input id="tax_horses" name="tax_horses" type="text" value="{{@old('tax_horses',$vehicule->tax_horses)}}" class="form-control" placeholder="Chevaux fiscaux"/>
                                            @error('tax_horses')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="serial_number">Numéro de série <span class="text-danger">*</span></label>
                                            <input id="serial_number" name="serial_number" type="text" value="{{@old('serial_number',$vehicule->serial_number)}}" class="form-control" placeholder="Numéro de série"/>
                                            @error('serial_number')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="initial_number_of_km">Kilométrage initial <span class="text-danger">*</span></label>
                                            <input id="initial_number_of_km" name="initial_number_of_km" type="text" value="{{@old('initial_number_of_km',$vehicule->initial_number_of_km)}}" class="form-control" placeholder="Kilométrage initial"/>
                                            @error('initial_number_of_km')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="mode_of_aquisition">Mode d'aquisition <span class="text-danger">*</span></label>
                                            <input id="mode_of_aquisition" name="mode_of_aquisition" type="text" value="{{@old('mode_of_aquisition',$vehicule->mode_of_aquisition)}}" class="form-control" placeholder="Mode d'aquisition"/>
                                            @error('mode_of_aquisition')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="key_double_location">Adresse du double des clés <span class="text-danger">*</span></label>
                                            <input id="key_double_location" name="key_double_location" type="text" value="{{@old('key_double_location',$vehicule->key_double_location)}}" class="form-control" placeholder="Adresse du double des clés"/>
                                            @error('key_double_location')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="observation">Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation',$vehicule->observation)}}</textarea>
                                            @error('observation')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="photos">Photos <span class="text-danger">*</span></label>
                                            <input id="photos" name="photos" type="file" value="{{@old('photos')}}" class="form-control" placeholder="Photos"/>
                                            @error('photos')
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



