@extends('admin.layouts.app')

@section('content')
    hello from dashboard
    <a href="{{route('admin.logout')}}">logout</a>
@endsection
