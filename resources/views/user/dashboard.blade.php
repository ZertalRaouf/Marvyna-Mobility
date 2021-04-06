@extends('user.layouts.app')

@section('content')
    hello from user dashboard
    <a href="{{route('user.logout')}}">logout</a>
@endsection
