<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/') }}img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('/') }}img/favicon.png">
  <title>
   {{ $title ?? config('app.name')}}
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('/') }}css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('/') }}css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/') }}css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">

@include('layouts.sidebar')

@include('layouts.navbar')

@isset($content)
    {{$content}}
@endisset

{{-- @yield('content') --}}
    
@include('layouts.footer')

