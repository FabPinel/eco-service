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
    <h1>Email Verification Mail</h1>
  
    Please verify your email with bellow link: 
    <a href="{{ route('user.verify', $token) }}">Verify Email</a>

</body>

</html>
