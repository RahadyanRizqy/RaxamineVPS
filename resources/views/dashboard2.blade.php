@extends('master')

@section('title', 'Raxamine VPS')

@push('style')
<link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
{{-- <style>
    .img-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .pc-logo {
        /* position: absolute;
        top: 25%;
        left: 50%;
        width: 50%;
        height: auto;
        transform: translate(-50%, -50%); */
        z-index: 1;
        /* filter: brightness(0) invert(1); */
    }

    .os-logo {
        position: absolute;
        z-index: 2;
    }

    /* .grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        padding: 20px;
        grid-gap: 20px;
    } */

    .grid-container {
        display: grid;
        grid-template-columns: repeat(5, 0fr); /* Adjust the number of columns as needed */
        gap: 50px;
/* Adjust the gap between cells as needed */
    }
    
    .cell {
        width: 155px;
        height: 175px; /* Adjust the height of cells as needed */
        background-color: rgb(221, 221, 221); /* Change the background color of cells as needed */
        /* cursor: pointer; */
        border: 2px solid black;
    }

    .add-logo {
        position: absolute;
        top: 35%;
        left: 50%;
        width: 50%;
        height: auto;
        transform: translate(-50%, -50%);
        /* z-index: 1; */
        /* filter: brightness(0) invert(1); */
    }

    /* .card-add {

    } */

    .ellipsis-icon:after {
        content: '\2807';
        position: absolute;
        bottom: 1px;
        right: 1px;
        font-size: 20px;
        border-radius: 20%;
        /* background-color: white; */
        cursor: pointer;
    }

    .card-add {
        /* border-style: solid; */
        cursor: pointer;
    }

    .card-content {
        inline-size: 150px;
        overflow-wrap: break-word;
        /* border-style: solid; */
        cursor: pointer;
    }

    p {
        margin-bottom: 0;
    }
</style>  --}}
@endpush

@section('content')
{{-- <h1>Dashboard</h1>
<a href="{{ route('section.main') }}">Home</a>
@if(Auth::user()->role_fk == 1)
<a href="{{ route('section.account')}}">Data Akun</a>
@endif
<a href="{{ route('user.profile') }}">Profil</a>
<a href="{{ route('user.logout') }}">Logout</a>
<a href="{{ route('section.service') }}">Layanan</a>
<a href="{{ route('section.activity') }}">Aktivitas</a>
<a href="{{ route('section.transaction') }}">Transaksi</a> --}}
{{-- @php
$section = '';
@endphp --}}
@if($section == 'activity')
    @include('section.activity')
@elseif($section == 'transaction')
    @include('section.transaction')
@else
    @include('section.main')
@endif

@endsection