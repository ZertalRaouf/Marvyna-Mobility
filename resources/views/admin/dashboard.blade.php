@extends('admin.layouts.app')

@push('css')
    {{--put your extra css here--}}
    <style>
        .card {
            border-radius: 16px !important;
        }
        #chart, #donnut {
            height: 325px;
        }
        @media screen and (max-width: 992px)  {
            #chart, #donnut {
                height: auto;
            }
        }
    </style>
@endpush

@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="text-info">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-info">Tableau de bord</a></li>
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

                <div class="row d-flex justify-content-between">

                    <div class="col-lg-2 text-center">

                        <div class="card bg-orange">
                            <div class="py-4 text-light">
                                <i class="fas fa-users fa-3x"></i>
                                <p class="font-weight-bold mt-3 mb-0">Utilisateurs</p>
                            </div>
                        </div>

                        <div class="card border-0 py-2 font-weight-bold">
                            {{$nbr_users ?? '1234'}}
                        </div>

                    </div>

                    <div class="col-lg-2 text-center">

                        <div class="card bg-info">
                            <div class="py-4">
                                <i class="fas fa-graduation-cap fa-3x"></i>
                                <p class="font-weight-bold mt-3 mb-0">Élèves</p>
                            </div>
                        </div>

                        <div class="card border-0 py-2 font-weight-bold">
                            {{$total_expenses ?? '1234'}}
                        </div>

                    </div>

                    <div class="col-lg-2 text-center">

                        <div class="card bg-red">
                            <div class="py-4">
                                <i class="fas fa-list-alt fa-3x"></i>
                                <p class="font-weight-bold mt-3 mb-0">Chauffeurs</p>
                            </div>
                        </div>

                        <div class="card border-0 py-2 font-weight-bold">
                            {{$total_expenses ?? '1234'}}
                        </div>

                    </div>

                    <div class="col-lg-2 text-center">

                        <div class="card bg-blue">
                            <div class="py-4">
                                <i class="fas fa-car fa-3x"></i>
                                <p class="font-weight-bold mt-3 mb-0">Véhicules</p>
                            </div>
                        </div>

                        <div class="card border-0 py-2 font-weight-bold">
                            {{$total_expenses ?? '1234'}}
                        </div>

                    </div>

                    <div class="col-lg-2 text-center">

                        <div class="card bg-grey">
                            <div class="py-4 text-light">
                                <i class="fas fa-map-marked-alt fa-3x"></i>
                                <p class="font-weight-bold mt-3 mb-0">Circuits</p>
                            </div>
                        </div>

                        <div class="card border-0 py-2 font-weight-bold">
                            {{$total_expenses ?? '1234'}}
                        </div>

                    </div>

                </div>


                <div class="row mt-5">

                    <div class="col-md-6">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <div class="card-title font-weight-bold">Statistiques</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" style="max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-info text-center">

                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <div class="card-title font-weight-bold">Liste des chauffeurs</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="bg-info">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col" class="text-center">Nom</th>
                                        <th scope="col" class="text-center">Prénom</th>
                                        <th scope="col" class="text-right">Numéro de téléphone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td class="text-center">Zertal</td>
                                        <td class="text-center">Raouf</td>
                                        <td class="text-right">0751 53 55 86</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td class="text-center">Zertal</td>
                                        <td class="text-center">Raouf</td>
                                        <td class="text-right">0751 53 55 86</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td class="text-center">Zertal</td>
                                        <td class="text-center">Raouf</td>
                                        <td class="text-right">0751 53 55 86</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-info text-center">
                                Voir tout
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin'],
                datasets: [{
                    label: '# Utilisateurs Actifs',
                    data: [5, 3, 8, 4, 3, 1],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
