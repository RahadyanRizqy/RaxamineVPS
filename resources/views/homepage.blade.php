@extends('master')

@section('title', 'Raxamine VPS')

@section('content')
<h1>Homepage</h1>
<a href="{{ route('account.index') }}">Login</a>
<a href="{{ route('account.create') }}">Register</a>
@endsection