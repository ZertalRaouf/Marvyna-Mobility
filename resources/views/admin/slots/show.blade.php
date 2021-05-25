@extends('admin.layouts.app')

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.slots.index')}}" class="text-info">Plannings</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-info">Details</a></li>
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
                        <div class="card border-info">
                            <div class="card-body">

                                <h3 class="text-info font-weight-bold">Détails Du Planning</h3>

                                <hr>
                                <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">Titre</div>
                                        <div class="font-weight-bold">{{$slot->name ?? 'Empty'}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">État</div>
                                        <div class="font-weight-bold">{{$slot->state ? 'Active' : 'InActive'}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">Date De Création</div>
                                        <div class="font-weight-bold">{{$slot->created_at->diffforhumans()}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">Dernière Modification</div>
                                        <div class="font-weight-bold">{{$slot->updated_at->diffforhumans()}}</div>
                                    </div>

                                </div>

                                <hr>

                                <div class="text-right">
                                    <a href="{{route('admin.slots.edit',$slot->id)}}" class="btn btn-info my-3" style="width: 135px">
                                        Modifier
                                    </a>
                                    <a href="{{route('admin.slots.index')}}" class="btn btn-info my-3" style="width: 135px">
                                        Retour
                                    </a>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card border-info">
                            <div class="card-body">
                                <h3 class="text-info font-weight-bold">Horaires</h3>
                                <hr>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-lg-auto">
                                        <a href="javascript:void(0)" id="create-btn"  data-toggle="modal" data-target="#modal-default" class="btn btn-info rounded-circle elevation-1"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="table" class="table table-valign-middle mt-3">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Jour</th>
                                            <th>Heure Début Matinée</th>
                                            <th>Heure Fin Matinée</th>
                                            <th>Heure Début Aprés Midi</th>
                                            <th>Heure Fin Aprés Midi</th>
                                            <th>Date de Création</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($slot->times as $key => $s)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$s->day}}</td>
                                                <td>{{$s->morning_start_at}}</td>
                                                <td>{{$s->morning_end_at}}</td>
                                                <td>{{$s->after_noon_start_at}}</td>
                                                <td>{{$s->after_noon_end_at}}</td>
                                                <td><span title="{{$s->created_at}}">{{$s->created_at->format('D, M d, Y')}}</span></td>
                                                <td class="text-white">
                                                    <a class="btn btn-info rounded-circle btn-sm" href="{{route('admin.slot-times.show',$s->id)}}">
                                                        <i class="fas fa-folder"></i>
                                                    </a>
                                                    <a class="btn btn-info rounded-circle btn-sm" href="{{route('admin.slot-times.edit',$s->id)}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-info rounded-circle btn-sm"  onclick="deleteForm({{$s->id}})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-center pt-4">
                            </div>
                            <!-- /.card-footer-->
                        </div>

                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </section>



    <!-- /.modal -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form  method="POST" action="{{route('admin.slot-times.store')}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Nouvel horaire</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="slot" class="text-muted font-weight-normal">Planning <span class="text-danger">*</span></label>
                                <select name="slot_id" id="slot" class="form-control @error('slot_id') is-invalid @enderror">
                                    @foreach($slots as $s)
                                        <option value="{{$s->id}}" {{old('slot_id') === $s->id ? 'selected' : ''}}>{{$s->name}}</option>
                                    @endforeach
                                </select>
                                @error('slot_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="day" class="text-muted font-weight-normal">Jour <span class="text-danger">*</span></label>
                                <select name="day" id="day" class="form-control @error('day') is-invalid @enderror" style="width: 100%;">
                                    @foreach(config('days') as $d)
                                        <option value="{{$d}}" {{old('day') === $d ? 'selected' : ''}}>{{$d}}</option>
                                    @endforeach
                                </select>
                                @error('days')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="morning_start_at" class="text-muted font-weight-normal">Heure Début Matinée <span class="text-danger">*</span></label>
                                <div class="input-group date" id="timepicker_morning_start_at" data-target-input="nearest">
                                    <input type="text" name="morning_start_at" value="{{old('morning_start_at')}}" id="start_at" class="form-control datetimepicker-input @error('morning_start_at') is-invalid @enderror" data-target="#timepicker_morning_start_at"/>
                                    <div class="input-group-append" data-target="#timepicker_morning_start_at" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                @error('morning_start_at')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="start_at" class="text-muted font-weight-normal">Heure Fin Matinée <span class="text-danger">*</span></label>
                                <div class="input-group date" id="timepicker_morning_end_at" data-target-input="nearest">
                                    <input type="text" name="morning_end_at" value="{{old('morning_end_at')}}" id="start_at" class="form-control datetimepicker-input @error('morning_end_at') is-invalid @enderror" data-target="#timepicker_morning_end_at"/>
                                    <div class="input-group-append" data-target="#timepicker_morning_end_at" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                @error('morning_end_at')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="after_noon_start_at" class="text-muted font-weight-normal">Heure Début Après Midi <span class="text-danger">*</span></label>
                                <div class="input-group date" id="timepicker_after_noon_start_at" data-target-input="nearest">
                                    <input type="text" name="after_noon_start_at" value="{{old('after_noon_start_at')}}" id="after_noon_start_at" class="form-control datetimepicker-input @error('after_noon_start_at') is-invalid @enderror" data-target="#timepicker_after_noon_start_at"/>
                                    <div class="input-group-append" data-target="#timepicker_after_noon_start_at" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                @error('after_noon_start_at')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="after_noon_end_at" class="text-muted font-weight-normal">Heure Fin Après Midi <span class="text-danger">*</span></label>
                                <div class="input-group date" id="timepicker_after_noon_end_at" data-target-input="nearest">
                                    <input type="text" name="after_noon_end_at" value="{{old('after_noon_end_at')}}" id="after_noon_end_at"  class="form-control datetimepicker-input @error('after_noon_end_at') is-invalid @enderror" data-target="#timepicker_after_noon_end_at"/>
                                    <div class="input-group-append" data-target="#timepicker_after_noon_end_at" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                    @error('after_noon_end_at')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                @error('after_noon_end_at')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
@endsection

@push('js')

    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>
    {{--put your extra js here--}}
    <script>

        @if($errors->count()>0)
        document.getElementById('create-btn').click();
        @endif

        $(document).ready(function (){
            //Initialize Select2 Elements
            $('.select2').select2()

            $('#timepicker_morning_start_at').datetimepicker({
                format: 'HH:mm'
            });
            $('#timepicker_morning_end_at').datetimepicker({
                format: 'HH:mm'
            });
            $('#timepicker_after_noon_start_at').datetimepicker({
                format: 'HH:mm'
            });
            $('#timepicker_after_noon_end_at').datetimepicker({
                format: 'HH:mm'
            });


            $('#table').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
            //Timepicker


        })

        function deleteForm(id){
            confirm('Are you sur ?') & createForm(id).submit();
        }

        const createForm = id => {

            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',`/admin/slot-times/${id}`);

            let i1 = document.createElement("input"); //input element, text
            i1.setAttribute('type',"hidden");
            i1.setAttribute('name','_token');
            i1.setAttribute('value','{{csrf_token()}}');

            let i2 = document.createElement("input"); //input element, text
            i2.setAttribute('type',"hidden");
            i2.setAttribute('name','_method');
            i2.setAttribute('value','DELETE');

            f.appendChild(i1);
            f.appendChild(i2);
            document.body.appendChild(f);

            return f;
        }

    </script>
@endpush

