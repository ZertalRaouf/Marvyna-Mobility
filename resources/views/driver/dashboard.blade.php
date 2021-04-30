@extends('admin.layouts.app')

@section('content')
    hello from driver dashboard
    <a href="{{route('driver.logout')}}">logout</a>
    <a href="{{route('driver.settings')}}">edit</a>

    <div>
        {{$d->first_name}}
        {{$d->last_name}}
        {{$d->email}}
        {{$d->phone}}
        <div>
            image
            <img src="{{$d->image_url}}" alt="">

        </div>
    </div>


    <div>
        @foreach($news as $n)

            <h1>
                {{$n->title}}
            </h1>
            <img src="{{$n->image_url}}" alt="">
            <p>
                {{$n->content}}
            </p>
        @endforeach
        {{$news->links()}}
    </div>
@endsection
