@extends('admin.layouts.auth')

@section('content')
    <div>
        @if(session('success'))
            {{session('success')}}
        @endif

        @if(session('error'))
            {{session('error')}}
        @endif
    </div>
    <form action="{{route('admin.reset.post')}}" method="POST">
        @csrf
        <input type="email" name="email">
        @error('email')
        {{$message}}
        @enderror
        <input type="password" name="password">
        @error('password')
        {{$message}}
        @enderror
        <input type="password" name="password_confirmation">
        @error('password_confirmation')
        {{$message}}
        @enderror
        <button type="submit">save</button>
    </form>
@endsection
