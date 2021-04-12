@extends('admin.layouts.app')

@section('content')
    hello from driver dashboard
    <a href="{{route('driver.logout')}}">logout</a>
@endsection
