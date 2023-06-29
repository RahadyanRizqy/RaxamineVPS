@extends('master')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/usersession.css') }}">
@endpush

@section('title', $session)


@section('content')
<div id="toasted" class="toasted">This is a toast message</div>
<button id="showToastBtn" class="d-none">Show Toast</button>
<section>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-form-container">
            <div class="register-form">
                <form action="{{ route('account.store', 'register') }}" method="post" autocomplete="off">
                    @csrf
                    <h3 class="text-center mt-3">{{ $session }}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-side">
                                <div class="form-group">
                                    <label for="fullname" class="form-label label-self">Nama lengkap</label>
                                    <input type="text" class="form-control" name="fullname" placeholder="John Doe">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label label-self">Alamat email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="johndoe@example.com">
                                    @if($errors->any())
                                    <div class="warning-container">
                                        <small class="form-email-warning d-block">Format email harus benar</small>
                                    </div>
                                    @else
                                    <div class="warning-container">
                                        <small class="form-email-warning">Format email harus benar</small>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label label-self">Password</label>
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
                        </div>
                        <div class="col-md-6">
                            <div class="right-side">
                                <div class="form-group">
                                    <label for="cc_number" class="form-label">Nomor kartu kredit</label>
                                    <input type="tel" class="form-control" id="cc-number" name="cc_number" maxlength="16" placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc_cvv" class="form-label">CVV</label>
                                            <input type="number" class="form-control" id="cc-cvv" name="cc_cvv" placeholder="123">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cc_expire" class="form-label">Kadaluarsa</label>
                                            <input type="text" class="form-control" id="cc-expire" name="cc_expire" maxlength="6" placeholder="2020 / 02">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mt-3">
                                    <input type="checkbox" class="form-check-input" id="do-later">
                                    <label class="form-check-label" for="do-later">Masukkan kartu kredit nanti</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row d-flex justify-content-center">
                        <div class="form-group submit-btn col-md-6 d-flex justify-content-center flex-column">
                            <button type="submit" class="btn btn-primary">{{ $session }}</button>
                        </div>
                        <p class="text-center mt-2">Sudah punya akun? <a href="{{ route('account.index') }}">Masuk</a> sekarang juga!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets/js/usersession.js')}}"></script>
@endsection