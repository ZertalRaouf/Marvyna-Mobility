@extends('admin.layouts.app')

@section('content')

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

@endsection
