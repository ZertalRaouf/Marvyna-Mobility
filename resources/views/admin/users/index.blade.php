@extends('admin.layouts.app')

@section('content')

    @if(session('success'))
        {{session('success')}}
    @endif

    @foreach($users as $user)
    <div>
        <span>
            {{$user->name}}
        </span>
        <span>
            {{$user->email}}
        </span>
        <span>
            {{$user->created_at}}
        </span>
    </div>
    @endforeach

@endsection
