@extends('admin.layouts.app')

@section('content')
    hello from driver dashboard
    <a href="{{route('driver.logout')}}">logout</a>
    <a href="{{route('driver.dashboard')}}">back</a>

    <div>
        <form action="{{route('driver.settings.update')}}" method="post">
            @csrf
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password">

            <input type="password" class="form-control" name="password_confirmation" placeholder="password confirmation">
            {{$errors}}
            <select name="is_available" id="is_available">
                <option value="yes" {{auth('driver')->user()->is_available == '1' ? 'selected' : ''}}>oui</option>
                <option value="no" {{auth('driver')->user()->is_available == '0'? 'selected' : ''}}>non</option>
            </select>

            <button type="submit">update</button>
        </form>
    </div>

@endsection
