@extends('user.layouts.app')

@section('content')
    <div class="container-fluid bg-green text-light pt-4" style="height: 125px"></div>


    <div class="container">
        <div class="row" style="margin-top: -75px">

            <div class="col-lg-12 mt-4">
                <div class="card border-0 bg-white shadow-sm px-0 px-lg-3">
                    <div class="card-body">

                        <h4 class="font-weight-bold py-3 text-orange">Paramètres du compte</h4>

                        <hr>

                        <form class="form-row" action="{{route('user.settings.update')}}" method="post">
                            @csrf
                            <div class="col-lg-6 mb-3">
                                <label for="password"class="small"><i class="fas fa-lock mr-1"></i>Nouveau mot de passe</label>
                                <input type="password" class="form-control" placeholder="Nouveau mot de passe" name="password">
                                @error('password')
                                <span class="small text-danger">
                                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="password_confirmation" class="small"><i class="fas fa-lock mr-1"></i>Confirmation du nouveau mot de passe</label>
                                <input type="password" class="form-control" placeholder="Confirmation du nouveau mot de passe" name="password_confirmation">
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-12 text-center text-lg-right">
                                <a href="{{route('user.dashboard')}}" class="btn border-0 shadow-sm bg-green text-white" style="width: 135px">Annuler</a>
                                <button type="submit" class="btn border-0 shadow-sm bg-green text-white" style="width: 135px">Enregistrer</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
