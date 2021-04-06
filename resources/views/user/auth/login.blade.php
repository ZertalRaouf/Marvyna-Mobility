@extends('user.layouts.auth')

@section('content')
    <form action="{{route('user.login.post')}}" method="POST">
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
        <a href="{{route('user.password.form')}}">forgot password</a>
    </form>
@endsection
