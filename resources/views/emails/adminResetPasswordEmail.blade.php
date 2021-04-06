@component('mail::message')

    # Welcome {{$data['admin']->name}}
    # This is an email for reset your account

    @component('mail::button', ['url' => url('admin/reset-password/'.$data['token'])])
        Click here to reset your password
    @endcomponent

    or <br>
    copy this link
    <a href="{{url('admin/reset-password/'.$data['token'])}}">{{url('admin/reset-password/'.$data['token'])}}</a><br>

    Thanks,<br>
    {{ config('app.name') }}

@endcomponent
