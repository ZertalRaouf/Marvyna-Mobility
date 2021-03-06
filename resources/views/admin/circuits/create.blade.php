@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.circuits.index')}}" class="text-info">Circuits</a></li>
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
                                <div class="card-title font-weight-bold">Ajouter un circuit</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('admin.circuits.store')}}">

                                    @csrf

                                    <div class="form-row">

                                        <div class="col-lg-4 mb-3">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input id="name" name="name" type="text" value="{{@old('name')}}" class="form-control" placeholder="Code"/>
                                            @error('name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 mb-3">
                                            <label for="driver">Driver <span class="text-danger">*</span></label>
                                            <select id="driver" name="driver_id" type="text" class="custom-select">
                                                @foreach($drivers as $d)
                                                    <option value="{{$d->id}}" {{old('driver_id') === $d->id ? 'selected' : ''}}>
                                                        {{$d->first_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('driver_id')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="col-lg-4 mb-3">
                                            <label for="vehicule_id">vehicule <span class="text-danger">*</span></label>
                                            <select id="vehicule_id" name="vehicule_id" type="text" class="custom-select">
                                                @foreach($vs as $v)
                                                    <option value="{{$v->id}}" {{old('vehicule_id') === $v->id ? 'selected' : ''}}>
                                                        {{$v->code}}</option>
                                                @endforeach
                                            </select>
                                            @error('vehicule_id')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="col-lg-6 mb-3">
                                            <label for="students"><i class="fas fa-user mr-1"></i>Students <span class="text-danger">*</span></label>
                                            <select id="students" name="students[]" type="text" class="custom-select" multiple>
                                                @foreach($students as $s)
                                                    <option value="{{$s->id}}">{{$s->first_name.' '.$s->last_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('students')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="direction">direction</label>
                                            <textarea id="direction" name="direction" rows="3" class="form-control" placeholder="Observation">{{old('direction')}}</textarea>
                                            @error('direction')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="observation">Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation')}}</textarea>
                                            @error('observation')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="from_date">From Date <span class="text-danger">*</span></label>
                                            <input id="from_date" name="from_date" type="date" value="{{@old('from_date')}}" class="form-control" placeholder="Date d'immatriculation"/>
                                            @error('from_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="end_date">End Date <span class="text-danger">*</span></label>
                                            <input id="end_date" name="end_date" type="date" value="{{@old('end_date')}}" class="form-control" placeholder="Date d'immatriculation"/>
                                            @error('end_date')
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


