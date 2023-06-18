@extends('master')

@section('title', 'Raxamine VPS')

@section('content')
<form class="col-sm-7">
  <div class="form-group row">
    <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="email" value="{{ $account->fullname ?? null }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="email" value="{{ $account->email ?? null }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Saldo</label>
    <div class="col-sm-4">
      @php
        $number = $account->balance ?? 0;
        $formattedNumber = 'Rp' . number_format($number, 0, ',', '.') . ',-';
      @endphp
      <input type="text" readonly class="form-control" id="email" value="{{ $formattedNumber }}" disabled>
    </div>
  </div>
  <a href="#" class="btn btn-warning">Tambah Saldo</a>
  <a href="#" class="btn btn-danger">Ubah Password</a>
  <a href="{{ url()->previous() }}" class="btn btn-dark">Kembali</a>
</form>
<script>
</script>
@endsection