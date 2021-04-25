<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title',env('APP_NAME'))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Multipleselect -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @stack('css')
    <style>
        :root {
            --info: #1ACEBB !important;
        }
        .bg-info {
            background-color: #1ACEBB !important;
        }
        .text-info {
            color: #1ACEBB !important;
        }
        .btn-info {
            background-color: #1ACEBB !important;
            border-color: #1ACEBB;
        }
        .btn-info:hover {
            background-color: #1ACEBB !important;
            border-color: #1ACEBB;
        }
        .btn-info:disabled {
            border-color: #1ACEBB;
        }
        .btn-outline-info {
            color: #1ACEBB !important;
            border-color: #1ACEBB !important;
        }
        .btn-outline-info:hover {
            color: white !important;
            background-color: #1ACEBB !important;
            border-color: #1ACEBB !important;
        }
        .sidebar-info {
            background-color: #1ACEBB !important;
            color: white !important;
        }
        .card-info {
            border-color: #1ACEBB !important;
        }
        .main-sidebar a{
            color: white !important;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            background-color: rgba(255, 255, 255, 0.3) !important;
        }

        .bg-orange {
            background-color: #FEA379 !important;
        }

        .bg-red {
            background-color: #F47F6F !important;
        }

        .bg-blue {
            background-color: #1297CF !important;
        }

        .bg-grey {
            background-color: dimgrey !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #1ACEBB !important;
            border-color: #1ACEBB !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[aria-selected]:hover {
            background-color: #1ACEBB !important;
        }

    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
@include('admin.layouts.partials.navBar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.layouts.partials.sideBar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @yield('header')

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin.layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{--<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>--}}

<!-- AdminLTE App -->
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    $("document").ready(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

    });
</script>

@stack('js')
</body>
</html>
