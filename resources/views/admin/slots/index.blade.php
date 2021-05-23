@extends('admin.layouts.app')

@push('css')
    {{--put your extra css here--}}

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.slots.index')}}" class="text-info">Slots</a></li>
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
                                <h3 class="text-info font-weight-bold">Slots</h3>
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
                                            <th>Name</th>
                                            <th>State</th>
                                            <th>Create At</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($slots as $key => $s)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$s->name}}</td>
                                                <td>
                                                    @if($s->state)
                                                        <span class="badge bg-success px-3 py-1">Active</span>
                                                    @else
                                                        <span class="badge bg-danger px-3 py-1">InActive</span>
                                                    @endif
                                                </td>

                                                <td><span title="{{$s->created_at}}">{{$s->created_at->format('D, M d, Y')}}</span></td>
                                                <td class="text-white">
                                                    <a class="btn btn-info rounded-circle btn-sm" href="{{route('admin.slots.show',$s->id)}}">
                                                        <i class="fas fa-folder"></i>
                                                    </a>
                                                    <a class="btn btn-info rounded-circle btn-sm" href="{{route('admin.slots.edit',$s->id)}}">
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
                                {{$slots->links()}}
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
            <form  method="POST" action="{{route('admin.slots.store')}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Slot</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="text-muted font-weight-normal">Slot Name <span class="text-danger">*</span></label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{old('name')}}"
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
                                    value="{{old('note')}}"
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
                                    <input class="form-check-input" {{old('state') ? 'checked' : ''}} type="checkbox" name="state" id="state">
                                    <label class="form-check-label" for="state">
                                        State
                                    </label>
                                </div>
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

    <script src="{{asset('admin-assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>

        @if($errors->count()>0)
            document.getElementById('create-btn').click();
        @endif

        $('#table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });

        function deleteForm(id){
            Swal.fire({
                title: 'Are you sure you want to delete this Admin?',
                text: 'You won\'t be able to revert this action!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Non',
            }).then((result) => {

                if (result.value) {
                    createForm(id).submit();
                }
            });
        }

        const createForm = id => {

            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',`/admin/slots/${id}`);

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
