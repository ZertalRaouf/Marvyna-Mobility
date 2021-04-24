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

                        <form method="POST" action="{{ route('user.login.post') }}" class="row">

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

                            <div class="col-12 mb-4">
                                <input type="password" class="form-control rounded-pill px-4" placeholder="Mot de passe" name="password">
                                @error('password')
                                <span class="small text-danger">
                                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Rester Connecter
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 text-center mb-4">
                                <button type="submit" class="btn bg-bootstrap text-white rounded-pill px-4 shadow-sm w-100">
                                    Se Connecter
                                </button>
                            </div>

                            <div class="col-12 text-center">

                                <p>
                                    <a href="{{route('user.password.form')}}" class="text-decoration-none text-dark">Mot de passe oublié ?</a>
                                </p>

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
