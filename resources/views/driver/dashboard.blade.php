@extends('driver.layouts.app')

@push('css')

    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    @endpush

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
                            @foreach($availabilities as $a)
                                {{$a->date->format('d/m/Y')}}
                                {{$a->from}}
                                {{$a->to}}
                                {{$a->reason}}
                                {{$a->note}}
                            @endforeach
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
                                @if(!$n->image)
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

                    <div class="card border-0 bg-white shadow-sm px-0 px-lg-3 mb-3">
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

                    <div class="card border-0 bg-white shadow-sm px-0 px-lg-3">
                        <div class="card-body">

                            <h4 class="font-weight-bold py-3 text-orange">Ma disponibilité</h4>

                            <hr>

                            <form action="{{route('driver.availabilities.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <lable for="date">Date</lable>
                                    <input type="date" id="date" value="{{old('date')}}"  class="form-control @error('date') is-invalid @enderror" name="date">
                                    @error('date')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="col-lg-12 mb-3">
                                    <label for="from" class="text-muted font-weight-normal">from <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="timepicker_from" data-target-input="nearest">
                                        <input type="text" name="from" value="{{old('from')}}" id="from" class="form-control datetimepicker-input @error('from') is-invalid @enderror" data-target="#timepicker_from"/>
                                        <div class="input-group-append" data-target="#timepicker_from" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                    @error('from')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label for="from" class="text-muted font-weight-normal">to <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="timepicker_to" data-target-input="nearest">
                                        <input type="text" name="to" value="{{old('to')}}" id="to" class="form-control datetimepicker-input @error('to') is-invalid @enderror" data-target="#timepicker_to"/>
                                        <div class="input-group-append" data-target="#timepicker_to" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                    @error('to')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <lable for="reason">reason</lable>
                                    <input type="text" id="reason" value="{{old('reason')}}"  class="form-control @error('reason') is-invalid @enderror" name="reason">
                                    @error('reason')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <lable for="note">Note</lable>
                                    <input type="text" id="note" value="{{old('note')}}"  class="form-control @error('note') is-invalid @enderror" name="note">
                                    @error('note')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit">send</button>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection


@push('js')

    <script src="{{asset('assets/admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        $('#timepicker_from').datetimepicker({
            format: 'HH:mm'
        });
        $('#timepicker_to').datetimepicker({
            format: 'HH:mm'
        });
    </script>

@endpush
