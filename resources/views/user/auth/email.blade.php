@extends('user.layouts.auth')

@section('content')
    <div>
        @if(session('success'))
            {{session('success')}}
        @endif

        @if(session('error'))
            {{session('error')}}
        @endif
    </div>
    <form action="{{route('user.password.post')}}" method="POST">
        @csrf
        <input type="email" name="email">
        @error('email')
        {{$message}}
        @enderror
        <button type="submit">send</button>
    </form>
@endsection
