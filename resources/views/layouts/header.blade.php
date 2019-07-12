<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <script type="text/javascript" src = "{{ asset('jquery/jquery.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d1b39625b5c0700129fbd0b&product='inline-share-buttons' async='async'></script>
    <title>Travelia</title>
</head>

<body>

    {{-- Navigation bar --}}
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container" style="margin-top:0px; margin-bottom:0px;">
          <a class="navbar-brand logo_font" href="{{ route('index') }}">Travelia</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('index') }}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('about') }}">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                  </li>
                  <li class="nav-item">
                      @guest
                        <a class="nav-link" href="{{ route('dashboard') }}">Login</a>
                      @else
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                      @endguest
                  </li>
              </ul>
              <form class="form-inline my-2 my-lg-0" method="post" action="{{ route('search') }}">
                {{ csrf_field() }}
                  <input class="form-control mr-sm-2" name="search_key" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
              </form>
          </div>
    </div>
    </nav>
    {{-- END Navigation bar --}}
