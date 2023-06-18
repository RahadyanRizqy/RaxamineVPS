@extends('master')

{{-- @section('title', "{$service->versions->operating_systems->name} {$service->versions->releases} VPS ID: {$service->id}") --}}

@section('content')
<h1>{{$service->vps_name}}{{$service->vps_total_price}}</h1>
@endsection