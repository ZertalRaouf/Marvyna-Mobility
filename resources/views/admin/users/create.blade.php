@extends('admin.layouts.app')

@section('content')

    <form method="POST" action="{{route('admin.users.store')}}">
        @csrf
        <input type="text" name="name" id="name" placeholder="name" value="{{old('name')}}">
        @error('name')
            {{$message}}
        @enderror
        <input type="email" name="email" id="email" placeholder="email" value="{{old('email')}}">
        @error('email')
            {{$message}}
        @enderror
        <input type="password" name="password" id="password" placeholder="password">
        @error('password')
            {{$message}}
        @enderror
        <button type="submit">ajouter</button>
    </form>

@endsection
