@extends('admin.layouts.app')

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.students.index')}}" class="text-info">Étudiants</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-plus-circle mr-2"></i>Ajouter un étudiant</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('admin.students.store')}}" enctype="multipart/form-data">

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
                                            <label for="last_name"><i class="fas fa-user mr-1"></i>Nom <span class="text-danger">*</span></label>
                                            <input id="last_name" name="last_name" type="text" value="{{old('last_name')}}" class="form-control" placeholder="Nom"/>
                                            @error('last_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="first_name"><i class="fas fa-user mr-1"></i>Prénom <span class="text-danger">*</span></label>
                                            <input id="first_name" name="first_name" type="text" value="{{old('first_name')}}" class="form-control" placeholder="Prénom"/>
                                            @error('first_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="birth_date"><i class="fas fa-user mr-1"></i>Date de naissance <span class="text-danger">*</span></label>
                                            <input id="birth_date" name="birth_date" type="date" value="{{old('birth_date')}}" class="form-control" placeholder="Date de naissance"/>
                                            @error('birth_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="enter_date"><i class="fas fa-user mr-1"></i>Date d'entrée <span class="text-danger">*</span></label>
                                            <input id="enter_date" name="enter_date" type="date" value="{{old('enter_date')}}" class="form-control" placeholder="Date d'entrée"/>
                                            @error('enter_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="leave_date"><i class="fas fa-calendar-alt mr-1"></i>Date de sortie <span class="text-danger">*</span></label>
                                            <input id="leave_date" name="leave_date" type="date" value="{{old('leave_date')}}" class="form-control" placeholder="Date de sortie"/>
                                            @error('leave_date')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="photo"><i class="fas fa-calendar-alt mr-1"></i>Photo <span class="text-danger">*</span></label>
                                            <input id="photo" name="photo" type="file" class="form-control" placeholder="Photo"/>
                                            @error('photo')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="observation"><i class="fas fa-list-alt mr-1"></i>Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation')}}</textarea>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="specificity"><i class="fas fa-list-alt mr-1"></i>Specifisité</label>
                                            <textarea id="specificity" name="specificity" rows="3" class="form-control" placeholder="Specifisité">{{old('specificity')}}</textarea>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="disability"><i class="fas fa-list-alt mr-1"></i>Handicap</label>
                                            <textarea id="disability" name="disability" rows="3" class="form-control" placeholder="Handicap">{{old('disability')}}</textarea>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="parents"><i class="fas fa-user mr-1"></i>Parents <span class="text-danger">*</span></label>
                                            <select id="parents" name="parents[]" type="text" class="custom-select" multiple>
                                                @foreach($parents as $parent)
                                                <option value="{{$parent->id}}">{{$parent->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('parents')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="establishments"><i class="fas fa-user mr-1"></i>Etablissements <span class="text-danger">*</span></label>
                                            <select id="establishments" name="establishments[]" type="text" class="custom-select" multiple>
                                                @foreach($establishments as $establishment)
                                                    <option value="{{$establishment->id}}">{{$establishment->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('establishments')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.students.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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



