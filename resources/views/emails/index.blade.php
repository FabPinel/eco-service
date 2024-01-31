@component('mail::message')
    <p>Hello {{ $user->name }}</p>

    @component('mail::button', ['url' => url('/verify' . $user->remember_token)])
        Vérifier
    @endcomponent

    {{ config('app.name') }}

@endcomponent
