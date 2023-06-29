@extends('master')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/usersession.css') }}">
@endpush

@section('title', $session)

@section('content')
<div id="toasted" class="toasted">Password anda salah!</div>
<button id="showToastBtn" class="d-none">Show Toast</button>
<section>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-form-container">
            <div class="login-form">
                <form action="{{ route('account.store', 'login') }}" method="post">
                    @csrf
                    <h3 class="text-center mt-3 mb-3">{{ $session }}</h3>
                    <div class="form-group space">
                        <label for="email" class="form-label">Alamat email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="johndoe@example.com">
                        <div class="warning-container">
                            @if ($errors->first('email'))
                            <small class="form-email-warning d-block">Format email harus benar</small>
                            @else
                            <small class="form-email-warning">Format email harus benar</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group space">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-input-container">
                            <input type="password" class="form-control" id="password" name="password" placeholder="*****************">
                            <i id="password-lock" class="fa-regular fa-eye-slash"></i>
                        </div>
                        <div class="warning-container">
                            @if ($errors->first('password'))
                            <small class="form-password-warning d-block">Format password (min. 8, A-z, 0-9, symbol)</small>
                            @else
                            <small class="form-password-warning">Format password (min. 8, A-z, 0-9, symbol)</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group submit-btn d-flex justify-content-center flex-column">
                        <button type="submit" class="btn btn-primary">{{ $session }}</button>
                        <p class="text-center mt-2">Tidak punya akun? <a href="{{ route('account.create') }}">Daftar</a> sekarang juga!</p>
                        <p>Bila lupa password</p>
                    </div>
              </form>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets/js/usersession.js')}}"></script>
@endsection