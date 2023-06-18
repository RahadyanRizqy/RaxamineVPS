@extends('master')

@section('title', 'Raxamine VPS')

@section('content')
<h1>Admin</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>VPS Name (Default)</th>
            <th>Operating System</th>
            <th>vCPU</th>
            <th>RAM / Disk</th>
            <th>Server</th>
            <th>Harga</th>
            <th>Pemilik</th>
            <th>Tanggal Pembuatan</th>
            <th>Tanggal Habis</th>
        </tr>
        @foreach ($services as $s)
        <tr>
            @php
                // $lower = $s->operating_systems->name . " " . $s->versions->releases . " x86_64 " . $s->cpus->cpu_type_name . " " . $s->cores->core_qty . "vcpu" . " " . $s->rams->memory_size . " " . $s->roms->memory_size . " " . $s->servers->locations->label . " " . $s->servers->bandwidths->value
                $lower = strtolower(str_replace(' ', '_', $s->versions->operating_systems->name)) . "_" . strtolower(str_replace(' ', '_', $s->versions->releases)) . "_x86_64_" . strtolower(str_replace(' ', '_', $s->cores->cpus->cpu_name)) . "_" . strtolower(str_replace(' ', '_', $s->cores->core_qty)) . "vcpu_" . strtolower(str_replace(' ', '_', $s->rams->memory_size)) . "_" . strtolower(str_replace(' ', '_', $s->roms->memory_size)) . "_" . strtolower(str_replace(' ', '_', $s->servers->locations->label)) . "_" . strtolower(str_replace(' ', '_', $s->servers->bandwidths->value)) . "_vps_id_" . $s->id;
            @endphp
            <td>{{ $s->id }}</td>
            @if (empty($s->vps_name))
                <td>{{ $lower }}</td>
            @else
                <td>{{ $s->vps_name }}</td>
            @endif
            <td>{{ $s->versions->operating_systems->name }} {{ $s->versions->releases }} x86_64</td>
            <td>{{ $s->cores->cpus->cpu_name }} x{{$s->cores->core_qty}}</td>
            <td>{{ $s->rams->memory_size }} / {{$s->roms->memory_size }}</td>
            <td>{{ $s->servers->locations->country }} / {{$s->servers->bandwidths->value }}Mbps</td>
            <td>Rp{{ $s->vps_total_price }}</td>
            <td>{{ $s->accounts->fullname }}</td>
            <td>{{ $s->created_at }}</td>
            <td>{{ $s->expired_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection