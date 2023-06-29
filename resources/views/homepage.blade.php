@extends('master')

@section('title', 'Raxamine VPS')

@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}"> --}}
@endpush

@section('content')
<h1>Raxamine VPS</h1>
<a href="{{ route('account.index') }}">Masuk</a>
<a href="{{ route('account.create') }}">Daftar</a>
@endsection