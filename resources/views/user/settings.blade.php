@extends('driver.layouts.app')

@section('content')
    <div class="container-fluid bg-green text-light pt-4" style="height: 125px"></div>


    <div class="container">
        <div class="row" style="margin-top: -75px">

            <div class="col-lg-12 mt-4">
                <div class="card border-0 bg-white shadow-sm px-0 px-lg-3">
                    <div class="card-body">

                        <h4 class="font-weight-bold py-3 text-orange">Paramètres du compte</h4>

                        <hr>

                        <form class="form-row" action="{{route('driver.settings.update')}}" method="post">
                            @csrf
                            <div class="col-lg-6 mb-3">
                                <label for="password">Nouveau mot de passe</label>
                                <input type="password" class="form-control rounded-pill px-4" placeholder="Nouveau mot de passe" name="password">
                                @error('password')
                                <span class="small text-danger">
                                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="password_confirmation">Confirmation du nouveau mot de passe</label>
                                <input type="password" class="form-control rounded-pill px-4" placeholder="Confirmation du nouveau mot de passe" name="password_confirmation">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="is_available">Disponibilité</label>
                                <select class="custom-select rounded-pill" name="is_available" id="is_available">
                                    <option value="yes" {{auth('driver')->user()->is_available == '1' ? 'selected' : ''}}>Disponible</option>
                                    <option value="no" {{auth('driver')->user()->is_available == '0'? 'selected' : ''}}>Non disponible</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-12 text-center text-lg-right">
                                <a href="{{route('driver.dashboard')}}" class="btn border-0 rounded-pill shadow-sm bg-green text-white" style="width: 135px">Annuler</a>
                                <button type="submit" class="btn border-0 rounded-pill shadow-sm bg-green text-white" style="width: 135px">Enregistrer</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
