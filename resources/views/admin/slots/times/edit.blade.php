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
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.slot-times.index')}}" class="text-info">Times</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-info">Edit</a></li>
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

                                <form class="needs-validation" novalidate method="POST" action="{{route('admin.slot-times.update',$st->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h3 class="text-info font-weight-bold">Edit Time</h3>

                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <label for="slot" class="text-muted font-weight-normal">Slot <span class="text-danger">*</span></label>
                                            <select name="slot_id" id="slot" class="form-control select2 @error('slot_id') is-invalid @enderror" style="width: 100%;">
                                                @foreach($slots as $s)
                                                    <option value="{{$s->id}}" {{old('slot_id',$st->id) === $s->id ? 'selected' : ''}}>{{$s->name}}</option>
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
                                                    <option value="{{$d}}" {{old('day',$st->day) === $d ? 'selected' : ''}}>{{$d}}</option>
                                                @endforeach
                                            </select>
                                            @error('days')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="end_at" class="text-muted font-weight-normal">morning_start_at <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="timepicker_morning_start_at" data-target-input="nearest">
                                                <input type="text" name="morning_start_at" value="{{old('morning_morning_start_at',$st->morning_start_at)}}" id="morning_start_at"  class="form-control datetimepicker-input @error('morning_start_at') is-invalid @enderror" data-target="#timepicker_morning_start_at"/>
                                                <div class="input-group-append" data-target="#timepicker_morning_start_at" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                                @error('morning_start_at')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            @error('morning_start_at')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="end_at" class="text-muted font-weight-normal">morning_end_at <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="timepicker_morning_end_at" data-target-input="nearest">
                                                <input type="text" name="morning_end_at" value="{{old('morning_end_at',$st->morning_end_at)}}" id="morning_start_at"  class="form-control datetimepicker-input @error('morning_end_at') is-invalid @enderror" data-target="#timepicker_morning_end_at"/>
                                                <div class="input-group-append" data-target="#timepicker_morning_end_at" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                                @error('morning_end_at')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            @error('morning_end_at')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="after_noon_start_at" class="text-muted font-weight-normal">after_noon_start_at <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="timepicker_after_noon_start_at" data-target-input="nearest">
                                                <input type="text" name="after_noon_start_at" value="{{old('after_noon_start_at',$st->after_noon_start_at)}}"
                                                       id="after_noon_start_at"
                                                       class="form-control datetimepicker-input @error('after_noon_start_at') is-invalid @enderror"
                                                       data-target="#timepicker_after_noon_start_at"/>
                                                <div class="input-group-append" data-target="#timepicker_after_noon_start_at" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                                @error('morning_end_at')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            @error('morning_end_at')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="end_at" class="text-muted font-weight-normal">after_noon_end_at <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="timepicker_after_noon_end_at" data-target-input="nearest">
                                                <input type="text" name="after_noon_end_at" value="{{old('after_noon_end_at',$st->after_noon_end_at)}}" id="after_noon_end_at"  class="form-control datetimepicker-input @error('after_noon_end_at') is-invalid @enderror" data-target="#timepicker_after_noon_end_at"/>
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
                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.slot-times.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
                                            Back
                                        </a>
                                        <button class="btn btn-info my-3" type="submit" style="width: 135px">
                                            Save
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

    <script src="{{asset('assets/admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        $(document).ready(function (){
            //Initialize Select2 Elements
            $('.select2').select2()

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

    </script>
@endpush



