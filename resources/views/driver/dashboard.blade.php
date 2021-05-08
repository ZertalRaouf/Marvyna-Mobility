@extends('driver.layouts.app')

@section('content')

    <div class="pb-5">

        <div class="container-fluid bg-green text-light pt-4" style="height: 225px">
            <div class="row text-center">
                <div class="col-12">
                    <img src="{{$d->image_url}}" alt="photo" height="75" style="border-radius: 50%">
                    <h4 class="mt-3">Bienvenue, <span class="font-weight-bold">{{$d->first_name}}</span> !</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row" style="margin-top: -75px">

                <div class="col-lg-3 text-center mt-4">
                    <div class="card border-0 bg-white shadow-sm px-0 px-lg-3">
                        <div class="card-body">

                            <h4 class="font-weight-bold py-3 text-orange">Mes Informations</h4>

                            <hr>

                            <div class="row">

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Nom Complet</p>
                                    <p class="text-capitalize">{{$d->first_name}} {{$d->last_name}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Numéro de téléphone</p>
                                    <p>{{$d->phone}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Adresse Email</p>
                                    <p>{{$d->email}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Type de compte</p>
                                    <p>Chauffeur</p>
                                </div>

                                <div class="col-lg-12">
                                    <p class="small fw-bold mb-2">Disponibilité</p>
                                    <p class="{{$d->is_available ? 'text-success' : 'text-danger' }}">
                                        @if($d->is_available)
                                            Disponible
                                        @else
                                            Non disponible
                                        @endif
                                    </p>
                                </div>

                            </div>

                            <hr>

                            <p class="text-center mb-0 py-3">
                                <a href="{{route('driver.settings')}}" class="text-decoration-none text-muted">
                                    Modifier mes informations
                                </a>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 text-center text-lg-left">
                    @forelse($news as $n)
                        <div class="card shadow-sm border-0 bg-white px-0 px-lg-3 mb-3">
                            <div class="card-body">
                                <div>
                                <span class="badge bg-green text-light px-3 mb-3">
                                    Actualité
                                </span>
                                </div>
                                <h3 class="text-capitalize mb-1">
                                    {{$n->title}}
                                </h3>
                                <div class="small text-muted mb-3">
                                    {{$n->created_at->format('d-m-Y')}}
                                </div>
                                <p class="text-justify">
                                    {{$n->content}}
                                </p>
                                @if($n->image)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <div class="embed-responsive-item border-0 bg-muted" alt="image" style="background-image: url('https://lalibreville.com/wp-content/uploads/2020/10/a-paris-capitale-de-la-france-comme-partout-ailleurs-en-europe-lepidemie-de-covid-19-repart-a-la-hausse.jpg');background-position: center;background-size: cover;background-repeat: no-repeat"></div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @empty
                        <div class="card shadow-sm border-0 bg-white px-0 px-lg-3 mb-3">
                            <div class="card-body text-muted text-center">
                                Aucune actualité disponible
                            </div>
                        </div>
                    @endforelse

                    {{$news->links()}}
                </div>

                <div class="col-lg-3 text-center mt-4">
                    <div class="card border-0 bg-white shadow-sm px-0 px-lg-3">
                        <div class="card-body">

                            <h4 class="font-weight-bold py-3 text-orange">Mon Planning</h4>

                            <hr>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-green text-white">
                                    <tr>
                                        <th>Date</th>
                                        <th>itineraire</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @for($i=0;$i<2;$i++)
                                        <tr>
                                            <td>24-05-2021</td>
                                            <td>
                                                <a href="{{route('driver.roadmap')}}" class="text-decoration-none text-green">
                                                    <i class="fas fa-map-marker-alt"></i>
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
        </div>

    </div>

@endsection
