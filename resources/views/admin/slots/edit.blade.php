@extends('admin.layouts.app')

@push('css')

@endpush

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.slots.index')}}" class="text-info">Users</a></li>
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

                                <form class="needs-validation" novalidate method="POST" action="{{route('admin.slots.update',$slot->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h3 class="text-info font-weight-bold">Edit Slot</h3>

                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label for="name" class="text-muted font-weight-normal">Slot Name <span class="text-danger">*</span></label>
                                            <input
                                                id="name"
                                                name="name"
                                                type="text"
                                                value="{{old('name',$slot->name)}}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Slot Name"
                                                autofocus
                                                required
                                            />
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="note" class="text-muted font-weight-normal">Slot Note <span class="text-danger">*</span></label>
                                            <input
                                                id="note"
                                                name="note"
                                                type="text"
                                                value="{{old('note',$slot->note)}}"
                                                class="form-control @error('note') is-invalid @enderror"
                                                placeholder="Slot Note"
                                                autofocus
                                                required
                                            />
                                            @error('note')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-check ">
                                                <input class="form-check-input" {{old('state',$slot->state) ? 'checked' : ''}} type="checkbox" name="state" id="state">
                                                <label class="form-check-label" for="state">
                                                    State
                                                </label>
                                            </div>
                                        </div>
                                    </div>



                                    <hr>

                                    <div class="text-right">
                                        <a href="{{route('admin.slots.index')}}" class="btn btn-outline-info my-3" style="width: 135px">
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').setAttribute('src',e.target.result)
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        document.getElementById('imgInp').addEventListener('change',(e)=> {
            readURL(e.target);
        })

    </script>
@endpush



