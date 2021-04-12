@extends('driver.layouts.auth')

@section('content')
    <div>
        @if(session('success'))
            {{session('success')}}
        @endif

        @if(session('error'))
            {{session('error')}}
        @endif
    </div>
    <form action="{{route('driver.login.post')}}" method="POST">
        @csrf
        <input type="email" name="email">
        @error('email')
        {{$message}}
        @enderror
        <input type="password" name="password">
        @error('password')
        {{$message}}
        @enderror
        <button type="submit">Login</button>
        <a href="{{route('driver.password.form')}}">forgot password</a>
    </form>
@endsection
