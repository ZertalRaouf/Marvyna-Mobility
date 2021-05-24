@extends('driver.layouts.app')

@section('content')

    <div class="pb-5">

        <div class="container-fluid bg-green text-light pt-4" style="height: 125px"></div>

        <div class="container-fluid">
            <div class="row" style="margin-top: -75px">

                <div class="col-lg-3 text-center mt-4">
                    <div class="card border-0 bg-white shadow-sm px-0 px-lg-3">
                        <div class="card-body">

                            <h4 class="font-weight-bold py-3 text-orange">Détails</h4>

                            <hr>

                            <div class="row">

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Date</p>
                                    <p class="text-capitalize">{{$circuit->from_date->format('d-m-Y')}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Nombre d'élèves</p>
                                    <p>{{$circuit->students->count()}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Circuit</p>
                                    <p>{{$circuit->name}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Direction</p>
                                    <p>{{$circuit->direction}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Horaires</p>
                                    <p>7h00 - 8h30</p>
                                </div>

                            </div>

                            <hr>

                            <p class="text-center mb-0 py-3">
                                <a href="javascript:void(0)" class="btn bg-green text-white text-decoration-none w-100" data-toggle="modal" data-target="#studentsListModal">
                                    Partager ma postion
                                </a>
                            </p>

                            <p class="text-center mb-0 pb-3">
                                <a href="javascript:void(0)" class="btn bg-green text-white text-decoration-none w-100" data-toggle="modal" data-target="#studentsListModal">
                                    Liste des élèves
                                </a>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mt-4 text-center text-lg-left">

                    <div class="card shadow-sm border-0 bg-white px-0 px-lg-3 mb-3">
                        <div class="card-body">

                            <img src="https://i.stack.imgur.com/PBMLE.jpg" alt="map" width="100%">

                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>

    <!-- Students List Modal -->
    <div class="modal fade" id="studentsListModal" tabindex="-1" role="dialog" aria-labelledby="studentsListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="table" class="table mt-3">
                            <thead class="bg-green text-white">
                            <tr>
                                <th class="align-middle text-center">#ID</th>
                                <th class="align-middle text-center">Nom et prénom</th>
                                <th class="align-middle text-center">Adresse</th>
                                <th class="align-middle text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @for($i = 0 ; $i < 3 ; $i++)
                                <tr>
                                    <td class="text-center align-middle">{{$i + 1}}</td>
                                    <td class="text-center align-middle text-capitalize">nom prénom</td>
                                    <td class="text-center align-middle">{{($i+1)*2}} rue nom de la rue 7500{{($i+1)*3}}</td>
                                    <td class="text-center text-white align-middle">

                                        <a class="btn bg-green text-white rounded-circle btn-sm" href="Tel: 0751-535-586">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a class="btn bg-green text-white rounded-circle btn-sm" href="">
                                            <i class="fas fa-folder"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endfor

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
        async
    ></script>
@endpush

