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
                        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}" class="text-info">Éleves</a></li>
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
                                <form method="POST" action="{{route('admin.students.update',$student->id)}}">

                                    @csrf
                                    @method('PUT')

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
                                            <input id="last_name" name="last_name" type="text" value="{{@old('last_name',$student->last_name)}}" class="form-control" placeholder="Nom"/>
                                            @error('last_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="first_name"><i class="fas fa-user mr-1"></i>Prénom <span class="text-danger">*</span></label>
                                            <input id="first_name" name="first_name" type="text" value="{{@old('first_name',$student->first_name)}}" class="form-control" placeholder="Prénom"/>
                                            @error('first_name')
                                            <span class="text-danger small">
                                                <i class="fas fa-exclamation-circle mr-2"></i>{{$message}}
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="col-lg-12 mb-3">
                                            <label for="observation"><i class="fas fa-list-alt mr-1"></i>Observation</label>
                                            <textarea id="observation" name="observation" rows="3" class="form-control" placeholder="Observation">{{old('observation',$student->observation)}}</textarea>
                                        </div>



                                        <div class="col-lg-6 mb-3">
                                            <label for="parents"><i class="fas fa-user mr-1"></i>Parents <span class="text-danger">*</span></label>
                                            <select id="parents" name="parents[]" type="text" class="form-control select2 w-100" multiple>
                                                @foreach($parents as $parent)
                                                    <option value="{{$parent->id}}" {{$student->users->contains($parent->id) ? 'selected' : ''}}>{{$parent->name}}</option>
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
                                            <select id="establishments" name="establishments[]" type="text" class="form-control select2 w-100" multiple>
                                                @foreach($establishments as $establishment)
                                                    <option value="{{$establishment->id}}" {{$student->establishments->contains($establishment->id) ? 'selected' : ''}}>{{$establishment->name}}</option>
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



