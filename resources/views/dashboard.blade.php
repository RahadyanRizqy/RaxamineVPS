@extends('master')

@section('title', 'Raxamine VPS')

@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}"> --}}
@endpush

@section('content')
<a href="#">Home</a>
<a href="{{ route('user.logout') }}">Logout</a>
{{-- <a href="{{ route('')}}"></a> --}}
@endsection