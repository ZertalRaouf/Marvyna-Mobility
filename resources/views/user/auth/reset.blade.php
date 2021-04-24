@extends('user.layouts.auth')

@section('content')

    <section class="py-75 d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-sm border-0 bg-white py-5 px-5">

                        <div>

                            @if(session('success'))
                                {{session('success')}}
                            @endif

                            @if(session('error'))
                                {{session('error')}}
                            @endif

                        </div>

                        <form method="POST" action="{{route('user.reset.post',$check_token->token)}}" class="row">

                            @csrf

                            <div class="col-12 text-center my-5">
                                <img src="{{asset('assets/front/images/logo.svg')}}" alt="logo" width="80%">
                            </div>

                            <div class="col-12 mb-3">
                                <input type="email" class="form-control rounded-pill px-4" placeholder="Adresse email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="small text-danger">
                                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <input type="password" class="form-control rounded-pill px-4" placeholder="Nouveau mot de passe" name="password">
                                @error('password')
                                <span class="small text-danger">
                                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <input type="password" class="form-control rounded-pill px-4" placeholder="Confirmation du nouveau mot de passe" name="password_confirmation">
                            </div>

                            <div class="col-12 text-center mb-4">
                                <button type="submit" class="btn bg-bootstrap text-white rounded-pill px-4 shadow-sm w-100">
                                    Enregistrer
                                </button>
                            </div>

                            <div class="col-12 text-center">

                                <p>
                                    <a href="{{url('/')}}" class="text-decoration-none text-bootstrap">Retour a l'accueil</a>
                                </p>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


