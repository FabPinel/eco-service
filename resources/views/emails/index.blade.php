<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    {{-- <h1>{{ $mailData['title'] }}</h1> --}}
    <p style="color: #cc1d1d; font-size: 26px;">Hello, this is a styled paragraph.</p>
    @if (isset($mailData['firstname']))
        <p>
            Message de : {{ $mailData['firstname'] }} {{ $mailData['lastname'] }}
        </p>
    @endif

    @if (isset($mailData['enterprise']))
        <p>Message de l'entreprise : {{ $mailData['enterprise'] }}</p>
    @endif
    <p>Message :{{ $mailData['body'] }}</p>
    <p>Adresse email de l'expéditeur : {{ $mailData['email'] }}</p>

    @if (isset($mailData['id_product']))
        <p>
            ID du produit : {{ $mailData['id_product'] }}
        </p>
    @endif

</body>

</html>
