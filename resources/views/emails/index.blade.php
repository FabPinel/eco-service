@component('mail::message')
    <p>Hello {{ $user->username }}</p>

    @component('mail::button', ['url' => url('/verify' . $user->remember_token)])
        Vérifier
    @endcomponent

    {{ config('app.name') }}

@endcomponent
