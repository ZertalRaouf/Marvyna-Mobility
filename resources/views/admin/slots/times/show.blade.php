@extends('admin.layouts.app')

@push('css')
    {{--put your extra css here--}}
@endpush

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.slot-times.index')}}" class="text-info">Times</a></li>
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

                                <h3 class="text-info font-weight-bold">Slot Time Details</h3>

                                <hr>
                                <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">Slot Name</div>
                                        <div class="font-weight-bold">{{$st->slot->name ?? 'Empty'}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">Slot State</div>
                                        <div class="font-weight-bold">{{$st->slot->state ? 'Active' : 'InActive'}}</div>
                                    </div>



                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">Day</div>
                                        <div class="font-weight-bold">{{$st->day}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">morning_start_at</div>
                                        <div class="font-weight-bold">{{$st->morning_start_at}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">morning_end_at</div>
                                        <div class="font-weight-bold">{{$st->morning_end_at}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">after_noon_start_at</div>
                                        <div class="font-weight-bold">{{$st->after_noon_start_at}}</div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="text-muted font-weight-normal">after_noon_end_at</div>
                                        <div class="font-weight-bold">{{$st->after_noon_end_at}}</div>
                                    </div>


                                </div>

                                <hr>

                                <div class="text-right">
                                    <a href="{{route('admin.slot-times.edit',$st->id)}}" class="btn btn-info my-3" style="width: 135px">
                                        Edit
                                    </a>
                                    <a href="{{route('admin.slot-times.index')}}" class="btn btn-info my-3" style="width: 135px">
                                        Back
                                    </a>
                                </div>

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
    {{--put your extra js here--}}
@endpush

