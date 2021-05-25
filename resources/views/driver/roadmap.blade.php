@extends('driver.layouts.app')

@push('css')
    <style>
        #map {
            height: 600px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
@endpush
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
                                <a href="javascript:void(0)" class="btn bg-green text-white text-decoration-none w-100"
                                   data-toggle="modal" data-target="#studentsListModal">
                                    Partager ma postion
                                </a>
                            </p>

                            <p class="text-center mb-0 pb-3">
                                <a href="javascript:void(0)" class="btn bg-green text-white text-decoration-none w-100"
                                   data-toggle="modal" data-target="#studentsListModal">
                                    Liste des élèves
                                </a>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mt-4 text-center text-lg-left">

                    <div class="card shadow-sm border-0 bg-white px-0 px-lg-3 mb-3">
                        <div class="card-body">
                            <div id="map"></div>
                            {{--                            <img src="https://i.stack.imgur.com/PBMLE.jpg" alt="map" width="100%">--}}

                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>

    <!-- Students List Modal -->
    <div class="modal fade" id="studentsListModal" tabindex="-1" role="dialog" aria-labelledby="studentsListModalLabel"
         aria-hidden="true">
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

                            @foreach($circuit->students as $key => $student)
                                <tr>
                                    <td class="text-center align-middle">{{$key}}</td>
                                    <td class="text-center align-middle text-capitalize">{{$student->name}}</td>
                                    <td class="text-center align-middle">{{$student->users->first()->address}}</td>
                                    <td class="text-center text-white align-middle">

                                        <a class="btn bg-green text-white rounded-circle btn-sm"
                                           href="Tel: {{$student->phone}}">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a class="btn bg-green text-white rounded-circle btn-sm" href="">
                                            <i class="fas fa-folder"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    {{--    <script--}}
    {{--        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0LW-Fj2hruSJXj0TnlYitxC28yYbxZZ8&callback=initMap&libraries=&v=weekly"--}}
    {{--        async--}}
    {{--    ></script>--}}

    <script>
        function initMap() {
            var marker;
            var msg;
            // The location of Uluru
            const driver = {lat: {{$circuit->driver->position_latitude}}, lng: {{$circuit->driver->position_longitude}} };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: driver,
            });
            // The marker, positioned at Uluru
            @foreach($circuit->students as $student)
                marker = new google.maps.Marker({
                position: {lat: {{$student->users->first()->latitude}}, lng: {{$student->users->first()->longitude}} },
                map: map,
            });
            msg = '{!! preg_replace( "/\r|\n/", "<br>", $student->users->first()->address ) !!} <br><a href="https://maps.google.com/?q={{$student->users->first()->latitude}},{{$student->users->first()->longitude}}" target="_blank">iténeraire</a>'
            attachSecretMessage(marker, msg);
            @endforeach

                var driver_marker = new google.maps.Marker({
                position: {lat: {{$circuit->driver->position_latitude}}, lng: {{$circuit->driver->position_longitude}} },
                map: map,
            });
            msg = 'Je suis la'
            attachSecretMessage(driver_marker, msg);


            function attachSecretMessage(marker, secretMessage) {
                const infowindow = new google.maps.InfoWindow({
                    content: secretMessage,
                });
                marker.addListener("click", () => {
                    infowindow.open(marker.get("map"), marker);
                });
            }
        }
    </script>
@endpush

