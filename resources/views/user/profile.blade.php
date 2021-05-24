@extends('driver.layouts.app')

@section('content')
    <div class="container-fluid bg-green text-light pt-4" style="height: 125px"></div>


    <div class="container mb-5">
        <div class="row" style="margin-top: -75px">

            <div class="col-lg-12 mt-4">
                <div class="card border-0 bg-white shadow-sm px-0 px-lg-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <h4 class="font-weight-bold py-3 text-orange">Mon profil</h4>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Nom et prénom</label>
                                <p class="py-0 text-capitalize">{{$u->first_name.' '.$u->last_name}}</p>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Adresse email</label>
                                <p class="py-0 text-lowercase">{{$u->email}}</p>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Numéro de téléphone</label>
                                <p class="py-0 text-capitalize">{{$u->phone}}</p>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Mobile</label>
                                <p class="py-0 text-capitalize">{{$u->mobile}}</p>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="small text-muted">Adresse</label>
                                <p class="py-0 text-capitalize">{{$u->address}}</p>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Date de naissance</label>
                                <p class="py-0 text-capitalize">{{$u->birth_date}}</p>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Nationnalité</label>
                                <p class="py-0 text-capitalize">{{$u->nationality}}</p>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Lieu de naissance</label>
                                <p class="py-0 text-capitalize">{{$u->place_of_birth}}</p>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Numéro de permis</label>
                                <p class="py-0 text-capitalize">{{$u->licence_number}}</p>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="small text-muted">Date d'expiration du permis</label>
                                <p class="py-0 text-capitalize">{{$d->licence_expiration_date}}</p>
                            </div>





                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-12 text-center text-lg-right">
                                <a href="{{route('driver.dashboard')}}" class="btn border-0 shadow-sm bg-green text-white" style="width: 135px">Retour</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

