{{-- <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="k7ClFFrKUeceGY5Ewo7LwWVwneGf5SPNgHJ92fxW">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {"csrfToken":"k7ClFFrKUeceGY5Ewo7LwWVwneGf5SPNgHJ92fxW"}    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="http://localhost:8000/home">Laravel</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                                                    <li><a href="http://localhost:8000/login">Login</a></li>
                            <li><a href="http://localhost:8000/register">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav> --}}


@extends('layout')
@extends('layouts.app')
@section('content')

  <div class="container">
  <form action="/search" method="get" role="search">
    {{csrf_field() }}
      <div class="input-group">
        <input type="text" class="list-group-item" name="searchA" placeholder="Search Anime">
          <button type="submit" class="btn btn-primary">Search</button>
      </div>
  </form></div>

      @if(isset($anime))
        @foreach ($anime as $animes)
          {{$animes->name}}

        @endforeach
      @endif

            @if(isset($animes))
                <h1>Anime</h1>
              @foreach ($animes as $anime)
                <div>
                  <a class="list-group-item" href="/home/{{$anime->id}}">{{$anime->name}}</a>
                </div>
              </div>
              @endforeach
            @endif

        </div>
@endsection
