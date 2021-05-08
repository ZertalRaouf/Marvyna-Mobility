@extends('admin.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section('header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.students.index')}}" class="text-info">Étudiants</a></li>
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
                                <div class="card-title font-weight-bold"><i class="fas fa-list mr-2"></i>Liste des étudiants</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row d-flex justify-content-between mb-3">
                                    <div class="col-md-auto text-center">
                                        <a href="{{route('admin.students.create')}}" class="btn btn-info rounded-circle elevation-1"><i class="fas fa-plus"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-info rounded-circle elevation-1"><i class="fas fa-file-pdf"></i></a>
{{--                                        <a href="javascript:void(0)" class="btn btn-info rounded-circle elevation-1"><i class="fas fa-file-upload"></i></a>--}}
                                        <a href="{{route('admin.students.export')}}" class="btn btn-info rounded-circle elevation-1"><i class="fas fa-file-download"></i></a>
                                    </div>
                                    <div class="col-lg-3 mt-4 mt-lg-0">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="client_search" value="" placeholder="Recherche">
                                                <span class="input-group-append">
                                                <button type="submit" class="btn btn-info text-white"><i class="fas fa-search"></i></button>
                                            </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table id="table" class="table mt-3">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Nom et Prénom</th>
                                        <th>Date d'ajout</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($students as $key => $student)
                                    <tr>
                                        <td class="align-middle">{{$key + 1}}</td>
                                        <td class="align-middle text-capitalize">{{$student->first_name.' '.$student->last_name}}</td>
                                        <td class="align-middle">{{$student->created_at->format('d-m-Y')}}</td>
                                        <td class="text-white align-middle">
                                            <a class="btn btn-info rounded-circle btn-sm" href="{{route('admin.students.show',$student->id)}}">
                                                <i class="fas fa-folder"></i>
                                            </a>
                                            <a class="btn btn-info rounded-circle btn-sm" href="{{route('admin.students.edit',$student->id)}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-info rounded-circle btn-sm" onclick="deleteForm({{$student->id}})">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-center pt-4">
                                {{ $students->links() }}
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

@endsection

@push('js')

    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin//plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>

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
                title: 'Êtes vous sûrs de vouloir supprimer cet utilisateur ?',
                text: 'Vous ne pourrez pas revenir en arrière !',
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
            f.setAttribute('action',`users/${id}`);

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

        @if(session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{session('success')}}'
        })
        @endif

    </script>
@endpush

