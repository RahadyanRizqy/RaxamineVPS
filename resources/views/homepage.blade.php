@extends('master')

@section('title', 'Raxamine VPS')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
@endpush

@section('content')
{{-- <h1>Homepage</h1>
<a href="{{ route('account.index') }}">Login</a>
<a href="{{ route('account.create') }}">Register</a> --}}
<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
    <a class="navbar-brand" href="#"><img src="{{asset('assets/image/vps.png')}}" alt="Logo" class="navbar-logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Beranda <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('account.index') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('account.create') }}">Register</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="https://wa.me/+6288804897436">Contact</a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Contoh Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">koyok iki</a>
            <a class="dropdown-item" href="#">iki</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">mbek iki</a>
          </div>
        </li> --}}
      </ul>
    </div>
</nav>
<div class="container">
    <h1 class="main-title">REXAMINE</h1>
    <p class="sub-title">Solusi VPS Terbaik</p>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection