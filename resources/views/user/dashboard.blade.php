@extends('user.layouts.app')

@section('content')

    <div class="pb-5">

        <div class="container-fluid bg-green text-light pt-4" style="height: 225px">
            <div class="row text-center">
                <div class="col-12">
                    <img src="{{$u->image_url}}" alt="photo" height="75" style="border-radius: 50%">
                    <h4 class="mt-3">Bienvenue, <span class="font-weight-bold">{{$u->first_name ?? 'Raouf Zertal'}}</span> !</h4>
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
                                    <p class="text-capitalize">{{$u->first_name ?? 'Raouf'}} {{$u->last_name ?? 'Zertal'}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Numéro de téléphone</p>
                                    <p>{{$u->phone ?? '+33 751 53 55 86'}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Adresse Email</p>
                                    <p>{{$u->email ?? 'z.raouf97@gmail.com'}}</p>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <p class="small fw-bold mb-2">Type de compte</p>
                                    <p>Parent</p>
                                </div>

                            </div>

                            <hr>

                            <p class="text-center mb-0 py-3">
                                <a href="{{route('user.settings')}}" class="text-decoration-none text-muted">
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

                            <h4 class="font-weight-bold py-3 text-orange">Suivre mon enfant</h4>

                            <hr>



                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
