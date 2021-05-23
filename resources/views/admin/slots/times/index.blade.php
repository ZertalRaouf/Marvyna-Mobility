@extends('admin.layouts.app')

@push('css')
    {{--put your extra css here--}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">


@endpush

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.slot-times.index')}}" class="text-info">Slot-times</a></li>
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
                                <h3 class="text-info font-weight-bold">Slot-times</h3>
                                <hr>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-lg-auto">
                                        <a href="javascript:void(0)" id="create-btn"  data-toggle="modal" data-target="#modal-default" class="btn btn-info rounded-circle elevation-1"><i class="fas fa-plus"></i></a>
                                    </div>
                                    <div class="col-lg-4 mt-3 mt-lg-0">
                                        <form>
                                            <div class="input-group border rounded">
                                                <input type="text" class="form-control border-0" name="client_search" value="" placeholder="Search">
                                                <span class="input-group-append">
                                                <button type="submit" class="btn bg-transparent text-white"><i class="fas fa-search text-info"></i></button>
                                            </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="table" class="table table-valign-middle mt-3">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Slot</th>
                                            <th>Day</th>
                                            <th>morning_start_at at</th>
                                            <th>morning_end_at</th>
                                            <th>after_noon_start_at </th>
                                            <th>after_noon_end_at </th>
                                            <th>End at</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($sts as $key => $s)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$s->slot->name}}</td>
                                                <td>{{$s->day}}</td>
                                                <td>{{$s->morning_start_at}}</td>
                                                <td>{{$s->morning_end_at}}</td>
                                                <td>{{$s->after_noon_start_at}}</td>
                                                <td>{{$s->after_noon_end_at}}</td>

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
                                    {{$sts->links()}}
                            </div>
                            <!-- /.card-footer-->
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


    <!-- /.modal -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form  method="POST" action="{{route('admin.slot-times.store')}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Time</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="slot" class="text-muted font-weight-normal">Slot <span class="text-danger">*</span></label>
                                <select name="slot_id" id="slot" class="form-control select2 @error('slot_id') is-invalid @enderror" style="width: 100%;">
                                    @foreach($slots as $s)
                                        <option value="{{$s->id}}" {{old('slot_id') === $s->id ? 'selected' : ''}}>{{$s->name}}</option>
                                    @endforeach
                                </select>
                                @error('slot_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="day" class="text-muted font-weight-normal">Day <span class="text-danger">*</span></label>
                                <select name="day" id="day" class="form-control select2 @error('day') is-invalid @enderror" style="width: 100%;">
                                    @foreach(config('days') as $d)
                                        <option value="{{$d}}" {{old('day') === $d ? 'selected' : ''}}>{{$d}}</option>
                                    @endforeach
                                </select>
                                @error('days')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="morning_start_at" class="text-muted font-weight-normal">morning_start_at <span class="text-danger">*</span></label>
                                <div class="input-group date" id="timepicker_start_at" data-target-input="nearest">
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
                                <label for="start_at" class="text-muted font-weight-normal">morning_end_at <span class="text-danger">*</span></label>
                                <div class="input-group date" id="timepicker_start_at" data-target-input="nearest">
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
                                <label for="after_noon_start_at" class="text-muted font-weight-normal">Start At <span class="text-danger">*</span></label>
                                <div class="input-group date" id="timepicker_start_at" data-target-input="nearest">
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
                                <label for="after_noon_end_at" class="text-muted font-weight-normal">End At <span class="text-danger">*</span></label>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
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
    <script>

        @if($errors->count()>0)
            document.getElementById('create-btn').click();
        @endif

        $(document).ready(function (){
            //Initialize Select2 Elements
            $('.select2').select2()

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
