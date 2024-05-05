<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ isset($title) ? $title : 'HOME' }} - LARAVEL 11</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ ASSET_URL . '/assets/bootstrap/css/bootstrap.min.css' }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
