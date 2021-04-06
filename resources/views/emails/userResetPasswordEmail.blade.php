@component('mail::message')

    # Welcome {{$data['user']->name}}
    # This is an email for reset your account

    @component('mail::button', ['url' => url('user/reset-password/'.$data['token'])])
        Click here to reset your password
    @endcomponent

    or <br>
    copy this link
    <a href="{{url('user/reset-password/'.$data['token'])}}">{{url('user/reset-password/'.$data['token'])}}</a><br>

    Thanks,<br>
    {{ config('app.name') }}

@endcomponent
