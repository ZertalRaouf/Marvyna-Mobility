@extends('admin.layouts.app')

@section('content')

    <form method="POST" action="{{route('admin.users.update',$user->id)}}">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="name" placeholder="name" value="{{old('name',$user->name)}}">
        @error('name')
        {{$message}}
        @enderror
        <input type="email" name="email" id="email" placeholder="email" value="{{old('email',$user->email)}}">
        @error('email')
        {{$message}}
        @enderror
        <input type="password" name="password" id="password" placeholder="password">
        @error('password')
        {{$message}}
        @enderror
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password confirmation">
        <button type="submit">enregistrer</button>
    </form>

@endsection
